<?php
class SectionController extends Section {
    public function getSection($params = array()) {
        try {
            if (!empty($params)) {
                if (isset($params['section_id'])) {
                    $section_id = $params['section_id'];
                    $condition = [
                        'WHERE' => "section_id = $section_id"
                    ];
                } else {
                    $condition = [];
                }
            } else {
                $condition = [];
            }
            
            $sections = $this->read($condition);
            if ($sections === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $responseSections = [];
            while ($row = $sections->fetch(PDO::FETCH_ASSOC)) {
                $responseSections[] = $row;
            }
    
            return $responseSections;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getActiveAcademicYear(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getActiveAcademicYear(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }

    // public function isStudentLogin() {
    //     $users = $this->read();
    //     $userArray = [];

    //     while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
    //         $userItem = [
    //             'Id' => $row['Id'],
    //             'email' => $row['email']
    //         ];
    //         array_push($userArray, $userItem);
    //     }

    //     return $userArray;
    // }
}