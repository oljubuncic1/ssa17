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
     <script src="js/scroll.js"></script>


</head>

<body>

<?php include 'partials/mainNavbar2.html'; ?>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="naslov">Prijavi se - Budi korak ispred!</p>
            </div>
        </div>

        <form name="prijavaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                        <p class="list-group-item-text tekstKoraka">Dodatne napomene</p>
                    </a></li> 
                     <li ><a class="korak" href="#step-6">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 6</h4>
                        <p class="list-group-item-text tekstKoraka">Slanje prijave</p>
                    </a></li>    
                </ul>
            </div>
            <div class="col-xs-12 col-md-8">
            

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
    <input type="hidden" class="btn-select-input" id="majica" name="majica" value="S" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">S</li>
        <li class="majica listItem">M</li>
        <li class="majica listItem">L</li>
        <li class="majica listItem">XL</li>
        <li class="majica listItem">XXL</li>
    </ul>
</a>
                                  <p class="error"><?php echo $majicaErr; ?></p>
                        </div>           
                
    
        <a class="sljedeci btn pull-right" >Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>





           

    <div  class="setup-content" id="step-2">
            <div class="col-xs-12 well">

            <label class="podnaslov podaciOFaxu">Podaci o fakultetu</label><br><br>

            <div  id="sviFaksovi">
            <div id="addr0">
                
<div class="form-group col-xs-12 col-md-9">
                            <label for="fakultet">
                                Fakultet*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="fax" name="fakultet0" value="S" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">S</li>
        <li class="listItem">ETF</li>
        <li class="listItem">Medicina</li>
        <li class="listItem">Farmacija</li>
        <li class="listItem">PPF</li>
    </ul>
</a>
                                  <p class="error"><?php echo $fakultetErr; ?></p>
                        </div>

                        <div class="form-group col-xs-12 col-md-3">
                            <label for="godinaStudija">
                                Godina studija*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="god" name="godina0" value="1." />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">1.</li>
        <li class="listItem">2.</li>
        <li class="listItem">3.</li>
        <li class="listItem">4.</li>
        <li class="listItem">5.</li>
        <li class="listItem">6.</li>
    </ul>
</a>
                                  <p class="error"><?php echo $godinaStudijaErr; ?></p>
                        </div>


                        <div class="form-group col-xs-12 col-md-6 prviFaks">
                            <label for="odsjek">
                                Odsjek</label>
                            <input type="text" class="form-control" id="odsjek0" name="odsjek0"  value="<?php echo $odsjek0;?>"/>
                        </div>

                        </div>

                        <div id="addr1"></div>

                        </div>


                         <div class="form-group col-xs-12">
                           <input type="button" value="Dodaj fakultet" class="btnSlanje col-xs-12  btn " id="add_row">
                        </div> 

                            
                          <div class="form-group col-xs-12 col-md-12">
                         <label class="podnaslov">Poznavanje engleskog jezika</label><br><br>

                            
            
                        </div>

                        <div class="form-group col-xs-12 col-md-6">
                            <label for="govor">
                                Govor*</label><br>

                    <div id="radioBtn1" class="btn-group">
                        <a class="btn btn-primary btn-sm active" data-toggle="govor" data-title="1">1</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="2">2</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="3">3</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="4">4</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="5">5</a>

                    </div>
                    <input type="hidden" name="govor" id="govor">
                                      </div>

                         <div class="form-group col-xs-12 col-md-6">
                            <label for="raz">
                                Razumijevanje*</label><br>

                    <div id="radioBtn2" class="btn-group">
                        <a class="btn btn-primary btn-sm active" data-toggle="raz" data-title="1">1</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="2">2</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="3">3</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="4">4</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="5">5</a>

                    </div>
                    <input type="hidden" name="raz" id="raz">
                                      </div>

                    


           
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>






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





    <div  class="setup-content" id="step-4">
            <div class="col-xs-12 well">
                

<div class="form-group col-xs-12 col-md-4 margina">
                            <label for="ranijeUcesce">
                                Ranije učešće na SSA*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="" name="ranije" value="NE" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">NE</li>
        <li class="listItem">DA</li>
    </ul>
</a>
                                  <p class="error"><?php echo $ranijeErr; ?></p>
                        </div>  

                        <div class="form-group col-xs-12">
                            <label for="radno">
                                Radno iskustvo</label>
                            <textarea name="radno" id="radno" class="form-control <?php if($radnoErr != '') echo tbError; else echo ''; ?>" rows="9" cols="25"
                                ><?php echo $radno;?></textarea>
                                <p class="error"><?php echo $radnoErr; ?></p>
                        </div>  


                        <div class="form-group col-xs-12 col-md-4 margina">
                            <label for="trenutno">
                                Trenutno zaposlenje*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="" name="trenutno" value="NE" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">NE</li>
        <li class="listItem">DA</li>
    </ul>
</a>
                                  <p class="error"><?php echo $trenutnoErr; ?></p>
                        </div>  


                        <div class="form-group col-xs-12">
                            <label for="softUcesce">
                                Učešće na soft skills treninzima</label>
                            <textarea name="softUcesce" id="softUcesce" class="form-control <?php if($softUcesceErr != '') echo tbError; else echo ''; ?>" rows="9" cols="25"
                                ><?php echo $softUcesce;?></textarea>
                                <p class="error"><?php echo $softUcesceErr; ?></p>
                        </div> 


                        <div class="form-group col-xs-12">
                            <label for="seminari">
                                Učešće na seminarima</label>
                            <textarea name="seminari" id="seminari" class="form-control <?php if($seminariErr != '') echo tbError; else echo ''; ?>" rows="9" cols="25"
                                ><?php echo $seminari;?></textarea>
                                <p class="error"><?php echo $seminariErr; ?></p>
                        </div>  

                        <div class="form-group col-xs-12">
                            <label for="nvo">
                                Iskustvo u NVO</label>
                            <textarea name="nvo" id="nvo" class="form-control <?php if($nvoErr != '') echo tbError; else echo ''; ?>" rows="9" cols="25"
                                ><?php echo $nvo;?></textarea>
                                <p class="error"><?php echo $nvoErr; ?></p>
                        </div>      
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>





    <div  class="setup-content" id="step-5">
            <div class="col-xs-12 well">
               <p class="napomena">Ukoliko smatrate da postoji još nešto važno što bismo trebali znati iskoristite ovo polje kako biste nam to rekli.</p>

 <div class="form-group col-xs-12">
                            <label for="pismo">
                                Dodatne napomene</label>
                            <textarea name="dodatne" id="dodatne" class="form-control <?php if($dodatneErr != '') echo tbError; else echo ''; ?>" rows="9" cols="25"
                                ><?php echo $dodatne;?></textarea>
                                <p class="error"><?php echo $dodatneErr; ?></p>
                        </div>             
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>



    <div  class="setup-content" id="step-6">
            <div class="col-xs-12 well">
               <p class="napomena">Klikom na dugme Pošalji prijavu Vaša prijava će biti poslana. Molimo Vas da prije slanja još jednom provjerite da li ste ispravno popunili sve korake.</p>

 <div class="form-group col-xs-12">
                           <input type="submit" name="prijavaSubmit" value="Pošalji prijavu" class="btnSlanje col-xs-12  btn">
                        </div>             
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a>
    
                
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