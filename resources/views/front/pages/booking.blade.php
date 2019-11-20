@extends('front.layout.master')
@section('content')
<section class="section-padding">
		<div class="container">

					<!--Court Rates Section -->
        	<h4 style="position: relative;left : 6%;color: white ;"><label>Futsal Court Rates:</label></h4>
         		<div class="row">
       
            <div class="col-md-4" >
                <div class="panel panel-default" style="background:linear-gradient(black,orangered); color: #333; height: 250px;">
                    <div class="panel-body" style="">
                        <h3  style="color: white;">Residents Rates</h3>
                        <p><span style="text-decoration: underline;color: white;"><strong>Weekdays</strong></span><br />
                        <span style="color: #d9d9d9;">Non-Peak Hours*   Rs.450/hr</span><br />
                        <span style="color: #d9d9d9;">Peak Hours**         Rs810/hr</span></p>
                        <p><span style="text-decoration: underline;color: white;"><strong>Weekends &amp; PHs</strong></span><br />
                        <span style="color: #d9d9d9;">Non-Peak Hours*  Rs.810/hr</span><br />
                        <span style="color: #d9d9d9;">Peak Hours**        Rs.900/hr</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="background:linear-gradient(black,orangered); color: #333;height: 250px;">
                    <div class="panel-body" style="">
                        <h3 style="color: white;">Non-Residents Rates</h3>
                        <p><span style="text-decoration: underline;color: white;"><strong>Weekdays</strong></span><br />
                        <span style="color: #d9d9d9;">Non-Peak Hours*   Rs.500/hr</span><br />
                        <span style="color: #d9d9d9;"> Peak Hours**         Rs.900/hr</span></p>
                        <p><span style="text-decoration: underline;color: white;"><strong>Weekends &amp; PHs</strong></span><br />
                        <span style="color: #d9d9d9;">Non-Peak Hours*   Rs.1000/hr</span><br />
                        <span style="color: #d9d9d9;"> Peak Hours**         Rs.1000/hr</span></p>
                    </div>
                 </div>
            </div>

             <div class="col-md-4">
                <div class="panel panel-default" style="background:#213e4a; color: yellow ;height: 80px;">
                    <div class="panel-body" style="">
                            <p>  **Non-peak Hours (9:00am &#8211; 5:00pm)<br>
                                **Peak Hours (5:00pm &#8211; 1:00am)
                             </p>
                    </div>
                </div>
            </div>
         </div>
         <!-- End of Court Rates Section -->
         <br><br><br>

          <div style="position: relative; left : 6%; font-size: 20px;">
        
        <form action="#" method="POST">
        <div class="field-container col-3">
        <p><label>Select Date:</label>
        <input type = "date" name = "bookdate" style="color:#222;" >
                              
        <input type="submit" class="btn btn-success " value="Check" name="dSubmit" onclick="myFunction(bookdate.value);"></input></span>
        </p>
        </form>
    
    </div>


<div style ="position:relative; top : 20px; left : 5%; margin: 10px; height:90%; width:80%; font-size: 20px;  padding : 3px; ">
				<form name = "shiftselect" action = "customer.php"  method = "POST"> 
					<b>Select your Shift (one at a time) and then press the proceed button. <br>
                    Selected Shifts will be booked for the date: <u>'  bookdate' </u></b>

                    <br>

               			 <table  border="0" cellspacing="40" cellpadding="50" height = "20%"><br><br><br>

								<tr  height= "50px"  class="btn-group-justified">

							<td style="color: black; font-size:22px;"  align="center" class="btn btn-success">

								<strong><input  type="radio" name="shift" required></strong> 3-4

							</td>
							<td style="color: black; font-size:22px;"  align="center" class="btn btn-success">

								<strong><input  type="radio" name="shift" required></strong> 4-5

							</td>

							<td style="color: red; font-size:20px; align="center" class="btn btn-warning" >

								<strong><input type="radio" name="shift" disabled></strong>1-2

							</td>		
				
			
								</tr>
						</table>


				  <input type = "hidden" name = "bookdate" value = "'.$bookdate.'"> <br><br>
				  <input type = "submit" style="color: black; font-size:22px;"  align="center" class="btn btn-success" class="btn btn-success" value = "Proceed " name = "proceed">
				  </form>
				  <br>
							<div style="position: relative; font-size:20px; float: right;" >
			        			<b> Index: </b><br>
			        			<button type="button" class="btn btn-success" style="color: black; font-size:22px;"  align="center" class="btn btn-success">Available
			       				<input type="radio" id="radio1" hidden disabled></button>
			       				<button type="button" class="btn btn-warning" style="color: black; font-size:22px;"  align="center" class="btn btn-success">Reserved
			        			<input type="radio" id="radio2" hidden disabled> </button>               
			     			</div>
				<br>
    	</div>
	</section>
@endsection