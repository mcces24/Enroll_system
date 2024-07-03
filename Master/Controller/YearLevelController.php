<?php
class YearLevelController extends YearLevel {
    public function getYearLevel($params = array()) {
        try {
            if (!empty($params)) {
                if (isset($params['course_id'])) {
                    $course_id = $params['course_id'];
                    $condition = [
                        'WHERE' => "course_id = $course_id"
                    ];
                } else {
                    $condition = [];
                }
            } else {
                $condition = [];
            }
            
            $yearLevel = $this->read($condition);
            if ($yearLevel === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $yearLevels = [];
            while ($row = $yearLevel->fetch(PDO::FETCH_ASSOC)) {
                $yearLevels[] = $row;
            }
    
            return $yearLevels;
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

    public function getYearLevelByCourse($courseId) {
        try {
            $yearLevelByCourseId = $this->readYearLevelByCourseId($courseId);
            if ($yearLevelByCourseId === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $yearLevelByCourseIds = [];
            while ($row = $yearLevelByCourseId->fetch(PDO::FETCH_ASSOC)) {
                $yearLevelByCourseIds[] = [
                    'year_id' => $row['year_id'],
                    'year_name' => $row['year_name'],
                    'course_id' => $row['course_id']
                ];
            }
    
            return $yearLevelByCourseIds;
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
}