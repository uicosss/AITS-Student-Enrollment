<?php


namespace AitsStudentEnrollment\Controller;


use AitsStudentEnrollment\Model\StudentEnrollment;
use AitsStudentEnrollment\Utilities\Utilities;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class AITS_Student_Enrollment
{

    public static function getStudentEnrollment($uin, $term)
    {

        if(empty($uin)) {

            throw new \Exception('UIN must be provided.');

        }

        if(empty($term)) {

            throw new \Exception('Term must be provided.');

        }

        $studentEnrollment = new StudentEnrollment();

        try {

            $client = new Client([
                'base_uri' => $_ENV['AITS_SERVICE_HOST']
            ]);

            $response = $client->request('GET', '/studentWS/query/edu.uillinois.Student.StudentEnrollment_1_0/' . $_ENV['AITS_SENDER_APP_ID'] . '/' . $uin . '/' . $term, [
                'headers' => [
                    'Content-type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'format' => 'json'
                ]
            ]);

            if ($response->getStatusCode('content-type') == 200) {

                $jsonString = $response->getBody()->getContents();

                $studentEnrollment->setFromJson($jsonString);

            }

            return $studentEnrollment;

        } catch (ClientException $e) {

            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            if(Utilities::is_cli()) {
                print_r($responseBodyAsString);
                echo PHP_EOL;
            }

            Utilities::SaveToErrorLog($responseBodyAsString, 'error', 'error');

        } catch (\Exception $e) {

            if(Utilities::is_cli()) {
                print_r($e->getMessage());
                echo PHP_EOL;
            }

            Utilities::SaveToErrorLog($e->getMessage(), 'warning', 'error');

        }

        return false;

    }

}