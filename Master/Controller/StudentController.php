<?php
class StudentController extends Student {
    

    public function preEnrollAdd($data) {
        $response = [];
        try {
            $stmt = $this->ifAlreadyPreEnroll($data);
            if ($stmt->rowCount() > 0) {
                $response['isPreEnroll'] = false;
                $response['type'] = 'error';
                $response['message'] = 'You have already submitted.';
            } else {
                $stmt = $this->createPreEnroll($data);
                if ($stmt) {
                    $response['isPreEnroll'] = true;
                    $response['type'] = 'success';
                    $response['message'] = 'Pre-enrolled Successfully.';
                } else {
                    $response['isPreEnroll'] = false;
                    $response['type'] = 'error';
                    $response['message'] = 'Something went wrong! Try Again.';
                }
            }
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in preEnrollAdd(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in preEnrollAdd(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
        return $response;
    }
}