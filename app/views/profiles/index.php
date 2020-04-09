<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT;?>/assets/css/profile.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT;?>/assets/css/userbar.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <section id= 'wrapper'>
        <!-- Header -->
        <header id="header">
          <div class= 'ficx'>
            <a href="#" class="logo marginlogo"><img src="images/logo.jpg" alt="" /></a>
          <h1><a href="index.html">Tree</a></h1>
          
        </div>
      
          <section class= 'disnonmin'>
            <form class="search" method="get" action="#">
              <input class= 'mobileview' type="text" name="query" placeholder="Search" />
            </form>
          </section>
          <div class= 'main bcid'>
            <ul>
              <li class="menu" id= 'notdon'>
                <a class="fa-users" href="<?php echo URL_ROOT;?>/users/lookInFuture">Menu</a>
              </li>
              <li class="menu" id= 'notdon'>
                <a class="fa-paper-plane" href="<?php echo URL_ROOT;?>/chat/index">Menu</a>
              </li>
              <li class="menu">
                <a id= 'uoFBi' class="fa-envelope" href="#">Menu</a>
              </li>
              <li class="menu disnonmin" id= 'notdon'>
                <a class="fa-user" href='<?php echo URL_ROOT;?>/users/index' class= 'sideprobtn'>Menu</a>
              </li>
              <li class="menu">
                <a id= 'menuclick' class="fa-cog" href="#menu" id= 'wiclink'>Menu</a>
              </li>
            </ul>
          </div>
        </header>
      
        <!-- Menu -->
        <section id="menu">
      
          <!-- Profile -->
            <section>
              <a href= '<?php echo URL_ROOT;?>/users/index' class= 'sideprobtn'><h3>My Profile</h3></a>
            </section>
      
          <!-- Links -->
            <section>
              <ul class="links">
                <li>
                  <?php echo '<a href= "'.URL_ROOT.'/users/editProfileDetail/">';?>
                    <h3>Edit Profile</h3>
                    
                  </a>
                </li>
                <li>
                  <a href="help.html">
                    <h3>Help</h3>
                    
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h3>Etiam sed consequat</h3>
                    <p>Phasellus sed ultricies mi congue</p>
                  </a>
                </li>
                <li>
                  <a href="settings.html">
                    <h3>Settings</h3>
                    <p>For any issue contact us</p>
                  </a>
                </li>
              </ul>
            </section>
      
          <!-- Actions -->
            <section>
              <ul class="actions stacked">
                <li><a href="javascript:void(0);" class="button large fit" id="logvidout">Log Out</a></li>
              </ul>
      
            </section>
         </section>
      
         <!--body-->
  <section class= 'cro_ca_a'>
      <div class= 'cro_ca_b'>
        <div class= 'cro_ca_z'>
          <div class= 'cro_ca_c'>
            <div class= 'cro_ca_d'>
            <div class="cliad"><div class="lciexo"><div class="bulciwc"><div class= 'cro_ca_f' id="userxlieimg"></div></div></div></div>
              <div class= 'cro_ca_l'>Joined <span class= 'cro_ca_m'><?php echo $data['joined'];?></span> ago</div>
            </div>
            <div class= 'cro_ca_e'>
              <div class= 'cro_ca_g' id="userivfullname"><?php echo $data['username'];?></div>
              
              <div class= 'cro_ca_h' id="usercoposition"><span class= 'cro_ca_i'></span><?php echo $data['strem']." ".$data['course']." at ".$data['institute'];?></div>
              <div class= 'cro_ca_h margin_cro_ca_h'><a href= '#'><span class= 'foccred'><i class="fas fa-coins" style= 'color: #333;'></i></span>Credit<span class= 'cro_ca_ii' id="cro_ca_ide"><?php echo $data['num_reputation'];?></span></a></div>
              <?php if($data['owner']=="logowner"){echo '<a href= "'.URL_ROOT.'/users/editProfileDetail/" class="ieblockmargin" id="editbtn"><button class= "button ssmallbtn">Edit</button></a>';}
              // else if($data['owner']=="nologowner" && $data['block']=="blocked"){
              //   echo '<button class= "button smallbtn" id="unblockBcts">Unblock</button>';
              // }else if($data['block']=="noblocked" && $data['owner']=="nologowner"){
              //   echo '<button class="button smallbtn" id="blockBsecx">Block</button>';
              //}
              
              ?>
              <div>
              <button class="button smallbtn" style="display:none;" id="followBcts">Follow</button>
              <button class="button smallbtn" style="display:none;" id="unfollowBsecx">Unfollow</button>
              <button class="button smallbtn" style="display:none;" id="followrequest">Requested</button>
              <button class="button smallbtn" style="display:none;" id="unblockBcts">Unblock</button>
              <button class="button smallbtn" style="display:none;" id="blockBsecx">Block</button>
              </div>
            </div>
          </div>
            <div class= 'cro_ca_n'>
              <div class= 'cro_ca_r'>
                
                <?php if($data['owner']=="logowner" || $data['follow']=="following"){echo '<a href= "'.URL_ROOT.'/users/profileElement/collection" class= "cro_ca_o">Collection <span class= "cro_ca_p" id="cro_ca_ida">'.$data['num_notification'].'</span>
                </a>';}else{
                  echo 'Collection <span class= "cro_ca_p'." m-r-34".'" id="cro_ca_ida">'.$data['num_notification'].'</span>';
                }?>
                <?php if($data['owner']=="logowner" || $data['follow']=="following"){echo '<a href= "'.URL_ROOT.'/users/profileElement/communities" class= "cro_ca_o">Communities <span class= "cro_ca_p" id="cro_ca_idb">'.$data['num_notification'].'</span>
                </a>';}else{
                  echo 'Communities <span class= "cro_ca_p'." m-r-34".'" id="cro_ca_idb">'.$data['num_notification'].'</span>';
                }?>
                <?php if($data['owner']=="logowner" || $data['follow']=="following"){echo '<a href= "'.URL_ROOT.'/users/profileElement/followers" class= "cro_ca_o">Followers
                  <span class= "cro_ca_p" id="cro_ca_idc">'.$data['num_follower'].'</span>
                </a>';}else{
                  echo 'Followers
                  <span class= "cro_ca_p'." m-r-34".'" id="cro_ca_idc">'.$data['num_follower'].'</span>';
                }?>
                <?php if($data['owner']=="logowner" || $data['follow']=="following"){echo '<a href= "'.URL_ROOT.'/users/profileElement/following" class= "cro_ca_o">Following
                  <span class= "cro_ca_p" id="cro_ca_idd">'.$data['num_following'].'</span>
                </a>';}else{
                  echo 'Following
                  <span class= "cro_ca_p" id="cro_ca_idd">'.$data['num_following'].'</span>';
                }?>
                
              </div>
            </div>
          </div>
        </div>
  <!--Profile head ends-->
  
  
  <!--Profile body starts-->
      <?php if($data['follow']=="following" || $data['owner']=="logowner"){
        echo "
        <div class= 'cro_ca_t'>
        <div class= 'cro_ca_u'>
          <div class= 'cro_ca_v colswitch'>
            <button class= 'cro_ca_w colswitch' id= 'defaultPost'>All</button>
            <button class= 'cro_ca_w colswitch' id='ciyblw'>Posts</button>
            <button class= 'cro_ca_w colswitch' id='ntkcow'>Comments</button>
          </div>
          <!--All Box starts-->
          <div class= 'cro_ca_x' id= 'cro_ca_x'>
          <div>
            <div class='percep'>
              <textarea id='enter_perception' placeholder='Post your perception about ".$data['username'].".'></textarea>
              <div><button class='button smallbtn' id='subpercepk'>Post</button></div>
            </div>
          </div>
          <div>
          <div class='cro_percep_he'>Perceptions about ".$data['username']."
          </div>
          <div id='allperherc'>
          </div>
        </div>
          </div>
          <!--All Box ends-->

          <!--Post Box starts-->
          <div class= 'cro_ca_x' id= 'cro_ca_xx'>
            <!--Post starts-->
            <div class= 'cro_ca_ac'>
              <div class= 'cro_ca_ad'>Posted at <a href='#'><span class='img_cro_ca_ae'></span><span class='cro_ca_ae'>TrivalEnamalMankin</span></a><span class= 'cro_ca_af'> 1 hour </span> ago
              </div>
              <div class= 'cro_ca_ag'>This is the title of what was posted and will be limitted and can be increased to some length.
              </div>
              <div class= 'cero_ca_ah'>
                  <div class= 'div_cb_ac cro_ca_ai'>
                      <div class= 'div_cb_af div_cb_ae'><i class='fas fa-arrow-up direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>106k</span><i class='fas fa-arrow-down direct_cb_g chng_font'></i>
                      </div>
                      <div class= 'div_cb_ae'><i class='fas fa-comment direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>106k</span>
                      </div>
                      <div class= 'div_ca_ag div_cb_ae'><i class='fas fa-brain direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>Collect</span>
                      </div>
                      <div class= 'div_cb_ae'>
                        <i class='fas fa-share direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>Share</span>
                      </div>
                    </div>
              </div>
            </div>
            <!--Post ends-->
  
            <!--Post starts-->
            <div class= 'cro_ca_ac'>
              <div class= 'cro_ca_ad'>Posted at <span class= 'cro_ca_ae'>ComputerScience</span><span class= 'cro_ca_af'> 1 hour </span> ago
              </div>
              <div class= 'cro_ca_ag'>This is the title of what was posted and will be limitted.
              </div>
              <div class= 'cero_ca_ah'>
                <div class= 'div_cb_ac cro_ca_ai'>
                <div class= 'div_cb_af div_cb_ae'><i class='fas fa-arrow-up direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>106k</span><i class='fas fa-arrow-down direct_cb_g chng_font'></i>
                </div>
                <div class= 'div_cb_ae'><i class='fas fa-comment direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>106k</span>
                </div>
                <div class= 'div_ca_ag div_cb_ae'><i class='fas fa-brain direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>Collect</span>
                </div>
                <div class= 'div_cb_ae'>
                  <i class='fas fa-share direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>Share</span>
                </div>
                </div>
              </div>
            </div>
            <!--Post ends-->

            <!--Post starts-->
            <div class= 'cro_ca_ac'>
              <div class= 'cro_ca_ad'>Posted at <span class= 'cro_ca_ae'>ComputerScience</span><span class= 'cro_ca_af'> 1 hour </span> ago
              </div>
              <div class= 'cro_ca_ag'>This is the title of what was posted and will be limitted.
              </div>
              <div class= 'cero_ca_ah'>
                <div class= 'div_cb_ac cro_ca_ai'>
                <div class= 'div_cb_af div_cb_ae'><i class='fas fa-arrow-up direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>106k</span><i class='fas fa-arrow-down direct_cb_g chng_font'></i>
                </div>
                <div class= 'div_cb_ae'><i class='fas fa-comment direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>106k</span>
                </div>
                <div class= 'div_ca_ag div_cb_ae'><i class='fas fa-brain direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>Collect</span>
                </div>
                <div class= 'div_cb_ae'>
                  <i class='fas fa-share direct_cb_g chng_font'></i><span class= 'div_cb_ad chng_font'>Share</span>
                </div>
                </div>
              </div>
            </div>
            <!--Post ends-->
          </div>
          <!--Post Box ends-->

          <!--Comment Box starts-->
          <div class= 'cro_ca_x' id= 'cro_ca_xxx'>
            <!--comment starts-->
            <div class= 'cro_cad_a'>
              <div class= 'cro_cad_b'>No Posts and Comments</div>
            </div>
            <!--comment ends-->

          </div>
          <!--Comment Box ends-->
        </div>
      </div>";
      }else{echo "<div class= 'cro_ca_t'>
        <div class= 'cro_ca_u'><div class= 'cro_ca_x' id= 'cro_ca_x'>
        <div>
          <div class='percep'>
            <textarea id='enter_perception' placeholder='Post your perception about ".$data['username'].".'></textarea>
            <div><button class='button smallbtn' id='subpercepk'>Post</button></div>
          </div>
        </div>
        <div>
        <div class='cro_percep_he'>Perceptions about ".$data['username']."</div>
        <div id='allperherc'>
        </div>
      </div>
        </div></div></div>";};?>
        
  <!--Profile body ends-->
      </div>
    </section>
      </section>
      <!--Community-->
          <!-- <section id= 'missiona' class="missionana">
          <div class= 'missionb'>
            <div class= 'oxijY'>
              <div class= 'oxijYa'>
                  <div class= 'cro_ca_tK'>
                      <div class= 'cro_ca_u'>
                        <div class= 'cro_ca_v'>
                          <button class= 'cro_ca_wK' id= 'defaultPostK'>Branches</button>
                          <button class= 'cro_ca_wK' id="peoplecocms">People You Follow</button>
                          <button class= 'cro_ca_wK' id="followvuvh">Followees</button>
                        </div>

                        <div class= 'cro_ca_xK' id= 'cro_ca_xK'>
                            <div class= 'xonciA' id="cro_vug_vu">
                                <div class= 'xonciaA'>
                                <div class= 'xonciAa'>
                                  <div class= 'xonciAb'>
                                    <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                  </div>
                                  <div class= 'xonciAe'>
                                    <div class= 'xonciAn'>
      
                                    <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary And More Bigger</a></span> following from <span class= 'xonciAd'>1 w</span>
                                    <div class= 'xonciAm'><span class= 'xonciAo'>1000</span> Members<span class= 'xonciAdot'></span><a href= '#'>Know More</a></div>
                                    </div>
                                  </div>
                                  </div>
                                  <div class= 'xonciAf'>
                                    <button class= 'button smallbtn'>Leave</button>
                                  </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <div class= 'xonciAn'>
          
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                        <div class= 'xonciAm'><span class= 'xonciAo'>1000</span> Members<span class= 'xonciAdot'></span><a href= '#'>Know More</a></div>
                                        </div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                        <div class= 'xonciAa'>
                                          <div class= 'xonciAb'>
                                            <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                          </div>
                                          <div class= 'xonciAe'>
                                            <div class= 'xonciAn'>
              
                                            <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                            <div class= 'xonciAm'><span class= 'xonciAo'>1000</span> Members<span class= 'xonciAdot'></span><a href= '#'>Know More</a></div>
                                            </div>
                                          </div>
                                          </div>
                                          <div class= 'xonciAf'>
                                            <button class= 'button smallbtn'>Follow</button>
                                          </div>
                                </div>
                              </div>
                            <div class= 'xonciAsu'>
                              <div class= 'xonciAsua'>
                                <h3>Suggestion For You</h3>
                              </div>
                              <div class= 'xonciA'>
                                  <div class= 'xonciaA'>
                                  <div class= 'xonciAa'>
                                    <div class= 'xonciAb'>
                                      <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                    </div>
                                    <div class= 'xonciAe'>
                                      <div class= 'xonciAn'>
        
                                      <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                      <div class= 'xonciAm'><span class= 'xonciAo'>1000</span> Members<span class= 'xonciAdot'></span><a href= '#'>Know More</a></div>
                                      </div>
                                    </div>
                                    </div>
                                    <div class= 'xonciAf'>
                                      <button class= 'button smallbtn'>Leave</button>
                                    </div>
                                  </div>
                                  <div class= 'xonciaA'>
                                      <div class= 'xonciAa'>
                                        <div class= 'xonciAb'>
                                          <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                        </div>
                                        <div class= 'xonciAe'>
                                          <div class= 'xonciAn'>
            
                                          <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                          <div class= 'xonciAm'><span class= 'xonciAo'>1000</span> Members<span class= 'xonciAdot'></span><a href= '#'>Know More</a></div>
                                          </div>
                                        </div>
                                        </div>
                                        <div class= 'xonciAf'>
                                          <button class= 'button smallbtn'>Leave</button>
                                        </div>
                                  </div>
                                  <div class= 'xonciaA'>
                                          <div class= 'xonciAa'>
                                            <div class= 'xonciAb'>
                                              <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                            </div>
                                            <div class= 'xonciAe'>
                                              <div class= 'xonciAn'>
                
                                              <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                              <div class= 'xonciAm'><span class= 'xonciAo'>1000</span> Members<span class= 'xonciAdot'></span><a href= '#'>Know More</a></div>
                                              </div>
                                            </div>
                                            </div>
                                            <div class= 'xonciAf'>
                                              <button class= 'button smallbtn'>Leave</button>
                                            </div>
                                  </div>
                                </div>
                            </div>
                        
                        </div>
              

                        <div class= 'cro_ca_xK' id= 'cro_ca_xxK'>
                            <div class= 'xonciA' id="cro_un_ck">
                                <div class= 'xonciaA'>
                                <div class= 'xonciAa'>
                                  <div class= 'xonciAb'>
                                    <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                  </div>
                                  <div class= 'xonciAe'>
                                    <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                  </div>
                                  </div>
                                  <div class= 'xonciAf'>
                                    <button class= 'button smallbtn'>UnFollow</button>
                                  </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>UnFollow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                        <div class= 'xonciAa'>
                                          <div class= 'xonciAb'>
                                            <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                          </div>
                                          <div class= 'xonciAe'>
                                            <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                          </div>
                                          </div>
                                          <div class= 'xonciAf'>
                                            <button class= 'button smallbtn'>UnFollow</button>
                                          </div>
                                </div>
                              </div>
                            <div class= 'xonciAsu'>
                              <div class= 'xonciAsua'>
                                <h3>Suggestion For You</h3>
                              </div>
                              <div id="xocro_cia">
                              <div class= 'xonciaA'>
                                  <div class= 'xonciAa'>
                                    <div class= 'xonciAb'>
                                      <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                    </div>
                                    <div class= 'xonciAe'>
                                      <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> Followers <span class= 'xonciAd'>1000</span>
                                    </div>
                                    </div>
                                    <div class= 'xonciAf'>
                                      <button class= 'button smallbtn'>Follow</button>
                                    </div>
                                  </div>
                                  <div class= 'xonciaA'>
                                      <div class= 'xonciAa'>
                                        <div class= 'xonciAb'>
                                          <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                        </div>
                                        <div class= 'xonciAe'>
                                          <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> Followers <span class= 'xonciAd'>1000</span>
                                        </div>
                                        </div>
                                        <div class= 'xonciAf'>
                                          <button class= 'button smallbtn'>Follow</button>
                                        </div>
                                  </div>
                                  <div class= 'xonciaA'>
                                          <div class= 'xonciAa'>
                                            <div class= 'xonciAb'>
                                              <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                            </div>
                                            <div class= 'xonciAe'>
                                              <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> Followers <span class= 'xonciAd'>1000</span>
                                            </div>
                                            </div>
                                            <div class= 'xonciAf'>
                                              <button class= 'button smallbtn'>Follow</button>
                                            </div>
                                  </div>
                            </div>
                            </div>
                        </div>
              

                        <div class= 'cro_ca_xK' id= 'cro_ca_xxxK'>
                            <div class= 'xonciA'>
                                <div class= 'xonciaA'>
                                <div class= 'xonciAa'>
                                  <div class= 'xonciAb'>
                                    <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                  </div>
                                  <div class= 'xonciAe'>
                                    <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                  </div>
                                  </div>
                                  <div class= 'xonciAf'>
                                    <button class= 'button smallbtn'>Follow</button>
                                  </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                        <div class= 'xonciAa'>
                                          <div class= 'xonciAb'>
                                            <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                          </div>
                                          <div class= 'xonciAe'>
                                            <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span> following from <span class= 'xonciAd'>1 w</span>
                                          </div>
                                          </div>
                                          <div class= 'xonciAf'>
                                            <button class= 'button smallbtn'>Follow</button>
                                          </div>
                                </div>
                              </div>
              
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </section> -->
        <section id= "missiona" class="missionana missionanaback">
        <div class="missionvlhfw">  
        <div class= "missionbprofileuserbar">
            <div class="jatiimgup">
            <div id="tcschodnot" class="tcschodi">
            <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span><div class="xonciAd" style='font-size: 11px;'>Credit <span class= 'xonciAd'>1000</span></div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span><div class="xonciAd" style='font-size: 11px;'>Credit <span class= 'xonciAd'>1000</span></div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
            </div>
            <div class="vlamxvd">
            <div class="anjcivh">Suggestions</div>
            <div id="clchandigj">
            <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span><div class="xonciAd" style='font-size: 11px;'>Credit <span class= 'xonciAd'>1000</span></div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span><div class="xonciAd" style='font-size: 11px;'>Credit <span class= 'xonciAd'>1000</span></div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span><div class="xonciAd" style='font-size: 11px;'>Credit <span class= 'xonciAd'>1000</span></div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span><div class="xonciAd" style='font-size: 11px;'>Credit <span class= 'xonciAd'>1000</span></div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                <div class= 'xonciaA'>
                                    <div class= 'xonciAa'>
                                      <div class= 'xonciAb'>
                                        <a href= '#'><img src= 'images/tech1.jpeg' class= 'image'></a>
                                      </div>
                                      <div class= 'xonciAe'>
                                        <span class= 'xonciAc'><a href= '#'>Himanshu Choudhary</a></span><div class="xonciAd" style='font-size: 11px;'>Credit <span class= 'xonciAd'>1000</span></div>
                                      </div>
                                      </div>
                                      <div class= 'xonciAf'>
                                        <button class= 'button smallbtn'>Follow</button>
                                      </div>
                                </div>
                                </div>
              <!-- <div class="jatiupdimgup">
                <div class="jatiimgtbtn">Delete Image</div>
              </div>
              <form class="formvytd" id="" enctype="multipart/form-data">
              <div class="jatiupdimgup">
                  <input type="file" class="custom-file-input" id="" name="file">
                  <label for="chmkadeimg" class="jatiimgtbtn">Choose Image</label>
              </div>
              <div style="color:red;display:none;" id="">* Select an image.</div>
              <div class="cisglbs">
                <input type="submit" class="smallbtn" value="Upload" name="imgfile">
                <button class="smallbtn button" type="button" id="">Cancel</button>
              </div>
              </form> -->
          </div>
          </div>
        </div>
        </section>
        <?php if($data['owner']=="logowner"){echo '<section id= "missiontob" class="missionana">
          <div class= "missionbprofile">
            <div class="jatiimgup">
              <div class="jatiupdimgup">
                <div class="jatiimgtbtn" id="delchmkadeimg">Delete Image</div>
              </div>
              <form class="formvytd" id="shawnbsj" enctype="multipart/form-data">
              <div class="jatiupdimgup">
                  <input type="file" class="custom-file-input" id="chmkadeimg" name="file">
                  <label for="chmkadeimg" class="jatiimgtbtn">Choose Image</label>
              </div>
              <div style="color:red;display:none;" id="erscsl">* Select an image.</div>
              <div class="cisglbs">
                <input type="submit" class="smallbtn" value="Upload" name="imgfile">
                <button class="smallbtn button" type="button" id="nottsvs">Cancel</button>
              </div>
              </form>
            </div>
          </div>
        </section>';}
        ?>
        
       
        <script src="<?php echo URL_ROOT;?>/assets/js/util.js"></script>
        <script src= '<?php echo URL_ROOT;?>/assets/js/userbar.js'></script>
  <script src= '<?php echo URL_ROOT;?>/assets/js/profile.js'></script>

</body>
</html>