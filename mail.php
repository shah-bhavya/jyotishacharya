<?php
                                                if(isset($_REQUEST['sub']))
                                                {
                                                $phoneErr = $messageErr = $nameErr = '';
                                                $name = $Subj = $phone = $message = '';
                                                require("class.phpmailer.php"); // path to the PHPMailer class
                                                require("class.smtp.php");
                                                $mail = new PHPMailer(); // create a new object
                                                //$mail->IsSMTP(); // enable SMTP
                                                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                                                $mail->SMTPAuth = true; // authentication enabled
                                                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                                                $mail->Host = "smtp.gmail.com";
                                                $mail->Port = 465; // or 587
                                                $mail->IsHTML(true);
                                                $mail->Username = "jyotish5532@gmail.com";
                                                $mail->Password = "Ashok@5532";
                                                $mail->SetFrom("jyotish5532@gmail.com");
                                                if (empty($_POST["name"])) {
                                                $nameErr = "Name is required";

                                                echo '<script type="text/javascript">';
                                                echo 'setTimeout(function () { swal("Name is required!","Please Enter Your Name","warning");';
                                                    echo '}, 1000);</script>';
                                                }
                                                else
                                                $name = $_POST['name'];

                                                if (empty($_POST["phone"])) {
                                                $phoneErr = "Mobile No. is required";
                                                echo '
                                                <script type="text/javascript">
                        ';
                                                    echo 'setTimeout(function () { swal("Mobile No is required!","Please Enter your Mobile No","warning");';
                                                    echo '}, 1000);</script>';
                                                } else {
                                                $phone = test_input($_POST["phone"]);
                                                // check if e-mail address is well-formed
                                                if (!preg_match("/^[0-9]{2}[0-9]{4}[0-9]{4}$/", $phone)) {
                                                $phoneErr = "Invalid Mobile No. format";
                                                echo '
                                                <script type="text/javascript">
                        ';
                                                    echo 'setTimeout(function () { swal("Invalid Mobile No Format!","Please Enter Correct Mobile No","error");';
                                                    echo '}, 1000);</script>';}
                                                else
                                                $phone = $_POST['phone'];

                                                }
                                                if (empty($_POST["message"])) {
                                                $phoneErr = "Message is required";

                                                echo '
                                                <script type="text/javascript">
                        ';
                                                    echo 'setTimeout(function () { swal("Message is required!","Please Enter Message","warning");';
                                                    echo '}, 1000);</script>';

                                                } else {
                                                $message = $_POST['message'];
                                                }
                                                $mail->Subject = "Contact Us | Jyotish Acharya Query";


                                                $Subj = $_POST['subject'];

                                                $mail->Body = nl2br("<strong>* Name :</strong>".$name."\n"."<strong>* Subject :</strong>".$Subj."\n"."<strong>* Mobile No :</strong>".$phone ."\n"."<strong>* Message :</strong>".$message);

                                                $mail->AddAddress("jyotish5532@gmail.com");
                                                if(!$mail->Send())
                                                {
                                                echo "<table>
                                                    <tr>
                                                        <td><span>Mailer Error: </span></td>
                                                    </tr>
                                                </table>" . $mail->ErrorInfo;
                                                }
                                                else
                                                {
                                                if(!empty($phoneErr) || !empty($messageErr) || !empty($nameErr))
                                                {
                                                echo "<table>
                                                    <tr>
                                                        <td><span>- Please Correct Error </span></td>
                                                    </tr>
                                                </table><br />";
                                                }
                                                else
                                                {
                                                echo '
                                                <script type="text/javascript">
                        ';
                                                    echo 'setTimeout(function () { swal("Message has been sent successfully!","Message sent to jyotish5532@gmail.com!","success");';
                                                    echo '}, 1000);</script>';
                                                }

                                                }
                                                }
                                                function test_input($data) {
                                                $data = trim($data);
                                                $data = stripslashes($data);
                                                $data = htmlspecialchars($data);
                                                return $data;
                                                }

                                                ?>