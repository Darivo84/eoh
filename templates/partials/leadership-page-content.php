<?php

$executive_board_members = get_field('executive_board_members'); 
$non_executive_board_members = get_field('non_executive_board_members');

?>


<div class="leadership-page">

    <section class="executive-board">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <h2><?php the_field('executive_board_heading'); ?></h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-between">
                
                    <?php if(is_array($executive_board_members)): ?>
                        <?php foreach ($executive_board_members as $member): ?> 

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="content-block">
                                        <div class="image">
                                            <img src="<?php echo $member['member_image']; ?>" class="d-block w-100" />
                                        </div>
                                        <div class="content">
                                            <h5><?php echo $member['member_name']; ?></h5>
                                            <p><?php echo $member['member_role']; ?></p>
                                        </div>
                                    </div>
                                </div>  
                
                        <?php endforeach; ?>                    
                    <?php endif; ?>                   

            </div>
        </div>
    </section>

    <section class="non-executive-board">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <h2><?php the_field('non_executive_board_heading'); ?></h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-between">
                
                    <?php if(is_array($non_executive_board_members)): ?>
                        <?php foreach ($non_executive_board_members as $member): ?> 

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="content-block">
                                        <div class="image">
                                            <img src="<?php echo $member['member_image']; ?>" class="d-block w-100" />
                                        </div>
                                        <div class="content">
                                            <h5><?php echo $member['member_name']; ?></h5>
                                            <p><?php echo $member['member_role']; ?></p>
                                        </div>
                                    </div>
                                </div>  
                
                        <?php endforeach; ?>                    
                    <?php endif; ?>  
     
            </div>
        </div>
    </section>

</div>