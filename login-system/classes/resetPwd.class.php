<?php
require_once 'Dbh.class.php';

class ResetPwd extends Dbh
{
    public function delReset($userMail)
    {
        $sql = 'DELETE FROM pwd_reset WHERE pwd_reset_email=?';
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt) {
            echo "There is an error";
            exit();
        } else {
            $stmt->execute([$userMail]);
            echo "OK delete";
        }
    }

    public function addReset($userMail, $selector, $token, $expires)
    {
        $sql = 'INSERT INTO pwd_reset (pwd_reset_email,pwd_reset_selector,pwd_reset_token,pwd_reset_expires)VALUES(?,?,?,?);';
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt) {
            echo "There is an error";
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $stmt->execute([$userMail, $selector, $hashedToken, $expires]);
            echo "OK add";
        }
    }

    public function checkReset($selector, $currentDate, $validator, $pwd)
    {
        $sql = 'SELECT * FROM pwd_reset WHERE pwd_reset_selector=? AND pwd_reset_expires>= ?;';
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt) {
            echo "There is an error";
            return false;
            exit();
        } else {
            $stmt->execute([$selector, $currentDate]);
            $result = $stmt->fetchAll();
            echo "has 2 tokens </br>";
            print_r($result);

            if ($result !== []) {
                foreach ($result as $item) {
                    $tokenBin = hex2bin($validator);
                    $tokenCheck = password_verify($tokenBin, $item['pwd_reset_token']);

                    if ($tokenCheck === false) {
                        echo "There is an error";
                        return false;
                        exit();
                    } else if ($tokenCheck === true) {
                        $tokenEmail = $item['pwd_reset_email'];

                        $sql = 'SELECT * FROM members WHERE u_email=?';
                        $stmt = $this->connect()->prepare($sql);
                        if (!$stmt) {
                            echo "There is an error";
                            return false;
                            exit();
                        } else {
                            $stmt->execute([$tokenEmail]);
                            $result = $stmt->fetchAll();
                            //print_r($result);

                            if ($result !== []) {

                                foreach ($result as $row) {
                                    $newPwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                                    print_r($tokenEmail);
                                    print_r($newPwdHash);

                                    $sql = 'UPDATE members SET u_pass=? WHERE u_email=?';
                                    $stmt = $this->connect()->prepare($sql);
                                    $stmt->execute([$newPwdHash, $tokenEmail]);

                                    //delete reset function redo after above.

                                }
                            }
                        }
                    }
                }
            } else {
                echo "need to re-submit your request";
                return false;
                exit();
            }
            return $result;
            echo "OK add";
        }
    }

}
