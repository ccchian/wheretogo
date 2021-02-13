<?php
require_once 'Dbh.class.php';

class Member extends Dbh
{
    public function addMember($uAccount, $uPass, $uEmail, $uPhone, $uFirstname, $uLastname)
    {
        $sql = 'INSERT INTO members (u_account,u_pass,u_email, u_phone, u_firstname, u_lastname) VALUES (?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);

        $hashPass = password_hash($uPass, PASSWORD_DEFAULT);

        $stmt->execute([$uAccount, $hashPass, $uEmail, $uPhone, $uFirstname, $uLastname]);
        return true;
    }

    public function delMember($uID)
    {
        $sql = 'DELETE FROM members WHERE u_id=:uID';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['uID' => $uID]);
    }

    public function updateMember($uID, $uPass, $uEmail, $uPhone, $uFirstname, $uLastname)
    {
        $sql = 'UPDATE members SET u_pass=:uPass, u_email=:uEmail, u_phone=:uPhone, u_firstname=:uFirstname , u_lastname=:uLastname WHERE u_id=:uID';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'uID' => $uID,
            'u_pass' => $u_pass,
            'u_email' => $u_email,
            'uPhone' => $uPhone,
            'uFirstname' => $uFirstname,
            'u_lastname' => $u_lastname,
        ]);
    }

    public function existMember($uAccount, $uEmail)
    {
        $sql = 'SELECT * FROM members WHERE u_account =? OR u_email=?;';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uAccount, $uEmail]);

        $result = $stmt->fetchAll();
        if ($result !== []) {
            foreach ($result as $item) {
                return $item;
            }
        } else {
            return false;
        }
        return $result;
    }

}

// $signupObj = new Member();
// $resultdata = $signupObj->existMember("3", "1@mail.com");
// if ($resultdata) {
//     $passHash = $resultdata["u_pass"];
//     echo $passHash;
//     //echo "find pass";

//     exit();
// } else {
//     header("Location: ../signup.php");
// }
