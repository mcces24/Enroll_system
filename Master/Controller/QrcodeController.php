<?php
class QrcodeController extends Qrcode {

    public function getQrcodeData($params = array()) {
        try {
            if (!empty($params)) {
                if (isset($params['student_id'])) {
                    $student_id = $params['student_id'];
                    $condition = [
                        'WHERE' => "student_id = $student_id"
                    ];
                } else {
                    $condition = [];
                }
            } else {
                $condition = [];
            }
            $qrCode = $this->getData($condition);
            if ($qrCode === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $qrCodeList = [];
            while ($row = $qrCode->fetch(PDO::FETCH_ASSOC)) {
                $qrCodeList[] = $row;
            }
    
            return $qrCodeList;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getQrcodeData(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getQrcodeData(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }
}