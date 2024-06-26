<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<div class="container">
     <?php   
        function getFiles($path, $elLinea){
                           //Get a list of file paths using the glob function.
                            $fileList = glob($path.'/*');
                            $foldername=explode("/",$path)[2];
                            $elemn=0;
                            
                            echo '<h2>Edizione '.$foldername." ";
                            echo '<small><span><a href="#toplist">Elenco</a></span></small><hr></h2>';
                            
                            //Inizio nuova riga
                            echo "<div class='row'>";
                            //Loop through the array that glob returned.
                            foreach($fileList as $filename){
                                
                                  //numero oggetti
                                  
                                  $name=explode("/",$filename)[2];
                                  
                                  if($elem>1 && ($elem%($elLinea))==0){
                                      //Creazione di una nuova linea
                                      
                                      
                                  }
                                  
                                  //echo $name;
                                  //Creazione colonne in numero indicato da $elLinea
                                 
                                  
                                  ?>
                                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                  <?php
                                  $filename1=str_replace("/orig/","/thumb/",$filename);
                                  /*echo $filename1;
                                    echo '<a href="'.$filename.'" class="thumb_link"><span class="selected">';
                                  echo '<div  class="col-md-4 col-xs-6 thumb" data-toggle="modal" style="background:url(\''.$filename1.'\'); min-height:100px;min-width: 100px; width:100%; height:auto;background-size: cover;" title="'.$name.'" alt="'.$name.'" class="thumb">
                                  </div>
                                  </a>';*/
                                  ?>
                                  <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="<?php echo $filename1; ?>"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="<?php echo $filename1; ?>"
                         alt="Another alt text">
                </a>
                </div>
                                  <?php
                                   $elem=$elem+1;
                            }
                            echo "</div>";
 
                        }
            
           ?>
           <div class="row">
               <div class="col-md-12">
           <?php 
            $dirs = array_filter(glob('imgs/orig/*'), 'is_dir');
            
            //Creazione della prima riga associata all'anno della cartella immagini da leggere
            
            $dirs=array_reverse($dirs);
            
            foreach ($dirs as $el){
                //echo $el;
                echo "<p><div class='row'>";
                echo "<div class='col-md-12'>";
                getFiles($el,6);
                echo "</div>";
                echo "</div>";
                echo "</p>";
                
            } 
            
            ?></div>
            <div class="col-md-8">
                <div 
            </div>
            </div>
            
	<div class="row">
		<div class="row">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>
            


        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<script>
    let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

</script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
