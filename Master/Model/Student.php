<?php
class Student {
    private $conn;
    private $table = 'students';

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to read users from the database
    public function read() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Method to create a new user
    public function createPreEnroll($data) {
        $query = "INSERT INTO $this->table (
            applicant_id, fname, mname, lname, semester_id, course_id, year_id, section_id, id_number, age,
            strand, address, status, gender, place_of_birth, date_of_birth, religion, contact, email, guardian,
            occupation, guardian_address, home_zipcode, nsat_score, year, elementary, elem_year, elem_address,
            high_school, high_year, high_address, school_graduated, school_year, school_address, type, status_type,
            academic, new_user_id
        ) VALUES (
            :applicant_id, :fname, :mname, :lname, :semester_id, :course_id, :year_id, :section_id, :id_number, :age,
            :strand, :address, :status, :gender, :place_of_birth, :date_of_birth, :religion, :contact, :email, :guardian,
            :occupation, :guardian_address, :home_zipcode, :nsat_score, :year, :elementary, :elem_year, :elem_address,
            :high_school, :high_year, :high_address, :school_graduated, :school_year, :school_address, :type, :status_type,
            :academic, :new_user_id
        )";

        $applicant_id = $data["applicant_id"] ? $data["applicant_id"] : '';
        $fname = $data["fname"] ? $data["fname"] : '';
        $mname = $data["mname"] ? $data["mname"] : '';
        $lname = $data["lname"] ? $data["lname"] : '';
        $age = $data["age"] ? $data["age"] : 0;
        $strand = $data["strand"] ? $data["strand"] : '';
        $semester_id = $data["semester_id"] ? $data["semester_id"] : '';
        $course_id = !empty($data["course_id"]) ? $data["course_id"] : 0;
        $year_id = !empty($data["year_id"]) ? $data["year_id"] : 0;
        $section_id = $data["section_id"] ? $data["section_id"] : 0;
        $id_number = $data["id_number"] ? $data["id_number"] : 0;
        $address = $data["address"] ? $data["address"] : '';
        $status = $data["status"] ? $data["status"] : '';
        $gender = $data["gender"] ? $data["gender"] : '';
        $place_of_birth = $data["place_of_birth"] ? $data["place_of_birth"] : '';
        $date_of_birth = $data["date_of_birth"] ? $data["date_of_birth"] : '';
        $religion = $data["religion"] ? $data["religion"] : '';
        $contact = $data["contact"] ? $data["contact"] : 0;
        $email = $data["email"] ? $data["email"] : '';
        $guardian = $data["guardian"] ? $data["guardian"] : '';
        $occupation = $data["occupation"] ? $data["occupation"] : '';
        $guardian_address = $data["guardian_address"] ? $data["guardian_address"] : '';
        $home_zipcode = $data["home_zipcode"] ? $data["home_zipcode"] : 0;
        $nsat_score = $data["nsat_score"] ? $data["nsat_score"] : '';
        $year = $data["year"] ? $data["year"] : '';
        $elementary = $data["elementary"] ? $data["elementary"] : '';
        $elem_year = $data["elem_year"] ? $data["elem_year"] : '';
        $elem_address = $data["elem_address"] ? $data["elem_address"] : '';
        $high_school = $data["high_school"] ? $data["high_school"] : '';
        $high_year = $data["high_year"] ? $data["high_year"] : '';
        $high_address = $data["high_address"] ? $data["high_address"] : '';
        $school_graduated = $data["school_graduated"] ? $data["school_graduated"] : '';
        $school_year = $data["school_year"] ? $data["school_year"] : '';
        $school_address = $data["school_address"] ? $data["school_address"] : '';
        $type = $data["type"] ? $data["type"] : '';
        //$exam_remarks = $data["exam_remarks"] : '';
        $status_type = $data["status_type"] ? $data["status_type"] : '';
        $academic = $data["academic"] ? $data["academic"] : '';
        $new_user_id = $data["new_user_id"] ? $data['new_user_id'] : 0;

        try {
            // Assuming $db is your PDO connection
            $stmt = $this->conn->prepare($query);
        
            $stmt->bindParam(':applicant_id', $applicant_id);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':mname', $mname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':semester_id', $semester_id);
            $stmt->bindParam(':course_id', $course_id);
            $stmt->bindParam(':year_id', $year_id);
            $stmt->bindParam(':section_id', $section_id);
            $stmt->bindParam(':id_number', $id_number);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':strand', $strand);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':place_of_birth', $place_of_birth);
            $stmt->bindParam(':date_of_birth', $date_of_birth);
            $stmt->bindParam(':religion', $religion);
            $stmt->bindParam(':contact', $contact);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':guardian', $guardian);
            $stmt->bindParam(':occupation', $occupation);
            $stmt->bindParam(':guardian_address', $guardian_address);
            $stmt->bindParam(':home_zipcode', $home_zipcode);
            $stmt->bindParam(':nsat_score', $nsat_score);
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':elementary', $elementary);
            $stmt->bindParam(':elem_year', $elem_year);
            $stmt->bindParam(':elem_address', $elem_address);
            $stmt->bindParam(':high_school', $high_school);
            $stmt->bindParam(':high_year', $high_year);
            $stmt->bindParam(':high_address', $high_address);
            $stmt->bindParam(':school_graduated', $school_graduated);
            $stmt->bindParam(':school_year', $school_year);
            $stmt->bindParam(':school_address', $school_address);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':status_type', $status_type);
            $stmt->bindParam(':academic', $academic);
            $stmt->bindParam(':new_user_id', $new_user_id);
            
            // Execute the statement
            if ($stmt->execute()) {
                return "Data inserted successfully.";
            } else {
                return "Error inserting data.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

        return false;
    }

    function ifAlreadyPreEnroll($data) {
        //semester_id != '$semester' AND academic != '$academic'
        $query = 'SELECT * FROM ' . $this->table . ' WHERE new_user_id = :new_user_id AND semester_id = :semester_id AND academic = :academic';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':new_user_id', $data['new_user_id']);
        $stmt->bindParam(':semester_id', $data['semester_id']);
        $stmt->bindParam(':academic', $data['academic']);
        $stmt->execute();
        return $stmt;
    }
    
}
