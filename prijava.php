<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Soft Skills Academy Sarajevo '17</title>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>


    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kontakt.css">
    <link rel="stylesheet" href="css/prijava.css">

     <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/prijava.js"></script>
    <script src="js/select.js"></script>


</head>

<body>

<?php include 'partials/mainNavbar2.html'; ?>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="naslov">Prijavi se - Budi korak ispred!</p>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12 col-md-4">
                <ul class="nav nav-pills nav-stacked  thumbnail setup-panel koraci">
                    <li class="active"><a class="korak" href="#step-1">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 1</h4>
                        <p class="list-group-item-text tekstKoraka">Osnovni podaci</p>
                    </a></li>
                    <li ><a class="korak" href="#step-2">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 2</h4>
                        <p class="list-group-item-text tekstKoraka">Podaci o obrazovanju</p>
                    </a></li>
                    <li ><a class="korak" href="#step-3">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 3</h4>
                        <p class="list-group-item-text tekstKoraka">Motivaciono pismo</p>
                    </a></li>
                    <li><a class="korak" href="#step-4">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 4</h4>
                        <p class="list-group-item-text tekstKoraka">Prethodno iskustvo</p>
                    </a></li> 
                    <li ><a class="korak" href="#step-5">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 5</h4>
                        <p class="list-group-item-text tekstKoraka">Ostalo</p>
                    </a></li>   
                </ul>
            </div>
            <div class="col-xs-12 col-md-8">
            <form>

    <div class="setup-content" id="step-1">
            <div class="col-xs-12 well">
               <!-- <p class="naslov1">Osnovni podaci</p> -->
             <p class="napomena"><i>Napomena: Polja označena sa * su obavezna.</i></p> 

            <div class="form-group col-xs-12 col-md-6">
                            <label for="ime">
                                Ime*</label>
                            <input type="text" class="form-control" id="ime" name="ime"  value="<?php echo $ime;?>"/>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="prezime">
                                Prezime*</label>
                            <input type="text" class="form-control" id="prezime" name="prezime"  value="<?php echo $prezime;?>"/>
                        </div>
                         <div class="form-group col-xs-12 col-md-6">
                            <label for="datum">
                                Datum rođenja*</label>
                            <input type="text" class="form-control" id="datum" name="datum"  value="<?php echo $datum;?>"/>
                        </div>
                          <div class="form-group col-xs-12 col-md-6">
                            <label for="telefon">
                                Broj telefona*</label>
                            <input type="text" class="form-control" id="telefon" name="telefon"  value="<?php echo $telefon;?>"/>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="email">
                                Email*</label>
                            <input type="text" class="form-control <?php if($emailErr != '') echo tbError; else echo ''; ?>" id="email" name="email" value="<?php echo $email;?>"/>
                            <p class="error"><?php echo $emailErr; ?></p>
                        </div>   
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="majica">
                                Veličina majice*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="" name="" value="" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected">S</li>
        <li>M</li>
        <li>L</li>
        <li>XL</li>
        <li>XXL</li>
    </ul>
</a>
                                  <p class="error"><?php echo $majicaErr; ?></p>
                        </div>           
                
    
        <a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>

</form>



            <form>

    <div  class="setup-content" id="step-2">
            <div class="col-xs-12 well text-center">
                <h1> STEP 2</h1>

<!-- <form> -->               
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>

</form>



            <form>

    <div  class="setup-content" id="step-3">
            <div class="col-xs-12 well">
                <p class="napomena">Motivaciono pismo je ključni kriterij prilikom izbora kandidata za radionicu. Preporučujemo vam da pažljivo napišete što bolje motivaciono pismo kako biste imali veće šanse za učešće na radionici.</p>

 <div class="form-group col-xs-12">
                            <label for="pismo">
                                Motivaciono pismo*</label>
                            <textarea name="pismo" id="pismo" class="form-control <?php if($mesErr != '') echo tbError; else echo ''; ?>" rows="12" cols="25"
                                ><?php echo $pismo;?></textarea>
                                <p class="error"><?php echo $pismoErr; ?></p>
                        </div>             
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>

</form>



            <form>

    <div  class="setup-content" id="step-4">
            <div class="col-xs-12 well text-center">
                <h1> STEP 4</h1>

<!-- <form> -->               
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>

</form>



            <form>

    <div  class="setup-content" id="step-5">
            <div class="col-xs-12 well text-center">
                <h1> STEP 5</h1>

<!-- <form> -->               
                
   
        
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>

</form>

</div>
        </div>
    </div>  



    


<?php include 'partials/footer.html'; ?>


</body>

</html>