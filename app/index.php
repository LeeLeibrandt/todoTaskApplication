<?php 

  include_once 'class/task.php';
  $task = new Task();
  $task->setStatus(2);
  $taskInfo = $task->getAllTask();

  include('templates/header.php');
  
?>
<section class="showcase">
  <div class="container">
    <div class="page-content page-container" id="page-content">
      <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="card-body">
                    <h3 class="card-title">My Tasks</h3>
                    <div class="add-items"> 
                      <input type="text" class="form-control todo-list-input" placeholder="Add Task..">
                      <button id="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">ADD</button> 
                    </div>
                    <div class="list-wrapper">
                        <div class="d-flex flex-column-reverse todo-list">
  
                            <?php foreach($taskInfo as $key=>$element) { 
                              if(!empty($element['status']) && $element['status']==1)
                              {
                                $class = 'class="completed"';
                                $checked = 'checked="checked"';
                              } 
                              else 
                              {
                                $class = '';
                                $checked = '';
                              }
                            ?>
           
                            <div <?php print $class; ?>>
                                <div class="form-check"> 
                                  <label class="form-check-label"> 
                                    <input class="checkbox" type="checkbox" <?php print $checked; ?> data-utaskid="<?php print $element['id']; ?>"> 
                                    <?php print $element['task']?><i class="input-helper" id="check"></i>
                                  </label> 
                                  <i data-dtaskid="<?php print $element['id']; ?>" id="delete" class="remove fa fa-times"></i>
                                </div> 
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('templates/footer.php');?>
