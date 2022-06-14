<?php

                                            $sql ="SELECT * FROM records WHERE tmp='$tmp'";
                                            $res = mysqli_query($mysqli,$sql);
                                            if(mysqli_num_rows($res) > 0){
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $id = $row['id'];
                                                    $sqlImg ="SELECT * FROM picture WHERE tmp='$tmp'";
                                                    $resImg = mysqli_query($mysqli,$sqlImg);
                                                    while($rowImg = mysqli_fetch_assoc($resImg)){
                                                        
                                                            echo "<img src='assets/image/uploads/user".$tmp.".jpg'>";
                                                       
                                                        
                                                    }
                                                }
                                            }

                                            $sql ="SELECT * FROM records WHERE tmp='$tmp1'";
                                            $res = mysqli_query($mysqli,$sql);
                                            if(mysqli_num_rows($res) > 0){
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $id = $row['id'];
                                                    $sqlImg ="SELECT * FROM picture WHERE tmp='$tmp1'";
                                                    $resImg = mysqli_query($mysqli,$sqlImg);
                                                    while($rowImg = mysqli_fetch_assoc($resImg)){
                                                        echo "<div>";
                                                            echo "<img src='assets/image/uploads/user".$tmp1.".jpg'>";
                                                       
                                                        echo "</div>";
                                                    }
                                                }
                                            }

                                            $sql ="SELECT * FROM records WHERE tmp='$tmp2'";
                                            $res = mysqli_query($mysqli,$sql);
                                            if(mysqli_num_rows($res) > 0){
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $id = $row['id'];
                                                    $sqlImg ="SELECT * FROM picture WHERE tmp='$tmp2'";
                                                    $resImg = mysqli_query($mysqli,$sqlImg);
                                                    while($rowImg = mysqli_fetch_assoc($resImg)){
                                                        echo "<div>";
                                                            echo "<img src='assets/image/uploads/user".$tmp2.".jpg'>";
                                                       
                                                        echo "</div>";
                                                    }
                                                }
                                            }
                                            ?> 