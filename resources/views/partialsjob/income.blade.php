<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intern</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partialsjob.head')
</head>

<body style="background-color:white">
    <div class="container-xxl bg-white p-0">
       @include('partialsjob.Nav')
       {{-- Baih ystoi shvv --}}
       <div class="container-xxl py-3 bg-primary hero-header">
        <div class="container my-5 py-3 px-lg-5">
            {{-- <div class="row g-5 py-5"> --}}
                 
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
    <br><br>  <br><div class="container" >
    <div class="row">
        <script src="https://content.ikon.mn/ikon/js/jq.js" charset="utf-8" data-turbo-track="reload"></script><script>
            function format(value, dec) {
              return value.toFixed(dec).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
            }
            
            
            
            var range_2020 = [
              [0, 500000, 20000],
              [500000, 1000000, 18000],
              [1000000, 1500000, 16000],
              [1500000, 2000000, 14000],
              [2000000, 2500000, 12000],
              [2500000, 3000000, 10000],
              [3000000, 10000000000, 0]
            ];
            function getRangeValue(range, tsalin) {
              var rvalue = 0;
              for(var i = 0; i < range.length; i ++) {
                if (tsalin > range[i][0] && tsalin <= range[i][1]) {
                  rvalue = range[i][2];
                  break;
                }
              }
              return rvalue;
            }
            
            function calculator(arr, initial, percent, ao_percent, tsalin, range) {
              arr[0] = initial;
              arr[1] = percent;
              arr[2] = ao_percent;
              arr[3] = tsalin + tsalin / 100.0 * arr[2]; //niit tsalingiin zardal
              arr[4] = tsalin / 100.0 * arr[2]; //baiguullagaas toloh
              arr[5] = tsalin; //tsalin
              arr[6] = (arr[0] * 10 > arr[5] ? tsalin  : arr[0] * 10) /100.0 * arr[1]; //huwi hun
              
              arr[7] = (arr[5] - arr[6]) / 100 * 10; //ao_10%
              arr[8] = getRangeValue(range, arr[5] - arr[6]); //hongololt
              arr[8] = arr[8] > arr[7] ? arr[7] : arr[8];  
              arr[9] = arr[5] - arr[6] - arr[7] + arr[8];   //gar deer awah
              arr[10]= arr[5]- arr[4]- arr[7]+arr[8];
              //format if you want
              arr[0] = format(arr[0], 0);
              arr[1] = format(arr[1], 1);
              arr[2] = format(arr[2], 1);
              for (var i = 3; i < 11; i ++) {
              arr[i] = format(arr[i], 2);  
              }
              arr[0] = `<span class='hidess1'>(${arr[0]})</span>`;
              arr[1] = `<span class='hidess1'>(${arr[1]}%)</span>`;
              arr[2] = `<span class='hidess1'>(${arr[2]}%)</span>`;
              arr[3] = `<div class="rorangebg">${arr[3]}</div>`
              arr[4] = `<span class='rred'>-${arr[4]}</span>`;
              arr[5] = `<div class='rgraybg'>${arr[5]}</div>`;
              arr[6] = `<span class='rred'>-${arr[6]}</span>`;  
              arr[7] = `<span class='rred'>-${arr[7]}</span>`;
              arr[8] = `<span class='rgreenbg'>+${arr[8]}</span>`;
              arr[9] = `<div class="p"><b>${arr[9]}</b></div>`  
               arr[10] = `<div class="p"><b>${arr[10]}</b></div>`  
              return arr;
            }
            
            function displayRender(arr) {
              var result = '';
              var titles = [
                 '<span class="hidess1">ХХДХ Хөдөлмөрийн хөлсний доод хэмжээ</span>', 
                '<span class="hidess1">НДШ (%)-Хувь хүн', 
                '<span class="hidess1">НДШ (%)-Байгууллага',
                '<div class="rorangebg">НИЙТ ЦАЛИНГИЙН ЗАРДАЛ</div>',
                '<span class="rred">НДШ-Байгууллагаас төлөх',
                '<div class="rgraybg">ҮНДСЭН ЦАЛИН<span class="hidess1"> Сарын үндсэн цалин</span></div>',
                '<span class="rred">НДШ -Хувь хүн төлөх', 
                '<span class="rred">ХХОАТ 10%', 
                '<span class="rgreenbg">Хөнгөлөлт<span class="hidess1"> - ХХОАТ-ийн хөнгөлөлт</span>', 
                '<div class="p"> <b>Гар дээр ирэх цалин(НДШ хувиараа төлөх үед)</b></div>',
                '<div class="p"><b>Гар дээр ирэх цалин(НДШ-Байгууллагаас төлөх үед)</b></div>'] ;
             for (var i = 0; i < titles.length; i ++) {
                result += `<tr>`;
                result += `<td><div class="my_titles">${titles[i]}</div></td>`;
                arr.forEach((e) => {
                  result += `<td class='rright'>${e[i] || ''}</td>`;
                });
                result += `</tr>`;
              }
              
              return result;
            }
            
            $(() => {
            
                $('#in1').keyup((event) => {
                if(event.keyCode === 13) {
                  $('#r_button').click();
                } else {
                  var val = $('#in1').val() || '0';
                  val = val.replace(/,/g, '');
                  $('#in1').val(format(parseFloat(val) || 0, 0));
                }
              });
            
              $('#r_button').click(() => {
                var tsalin = (parseFloat(($("#in1").val() || '0').replace(/,/g, '')) || 0);
                
                var arr = [
                 
                  calculator([], 550000, 13.5, 12.5, tsalin, range_2020),
                ];
                $('#r_table_body').html(displayRender(arr));    
              });
            
               $('#r_table_body').html(displayRender([[],[],[]]));
            })
            
            </script>
            <style>
                .rgreenbg {
                    
                    color: #4CAF50;
                    }
                    
                    .hidess1 {
                        color: #C6C6C6;
                    }
                    .rred{
                        color: #FF4646;
                    }
                     .p{
                        color: #6222CC;
                    }
            </style>
        
             <body style="background-color: #F6F4F9">  
            
           <p class="section-title text-secondary justify-content-center"><span></span>Тооцоолол<span></span></p>
           <h1 class="text-center mb-5">Цалингаа тооцоолцгооё</h1>
            <div class="row justify-content-center">
               <div class="col-lg-7 text-center">
                    <div class="position-relative w-100 mt-3">
                        <input id="in1" class="form-control border-0 shadow-5 rounded-pill w-100 ps-4 pe-5 shadow-sm p-3 mb-5 bg-white rounded" type="text" placeholder="Цалингийн хэмжээг оруулнa уу (сараар)" style="height: 48px;">
                        <button id="r_button" type="submit"  class="btn btn btn-primary shadow-none position-absolute top-0 end-0 mt-1 me-2 rounded-pill"> Тооцоолох</button>
                    </div>
                </div>
                {{-- <button  class="input-group-text shadow-none px-4 btn-warning" class="my_button1" style="background-color: #FBA504" id="r_button">цалин бодох</button></div> --}}
                </div>
           
            <table class="table" cellpadding="1" cellspacing="1" style="width:100%;">
                <thead>
                    <tr>
                        <th>Задаргаа</th>
                        
                        <th>2023 он</th>
                         <th></th>
                         <th></th>
                    </tr>
                </thead>
                <tbody id="r_table_body">
                </tbody>
            </table>
           
       
                  
                        </div>  
                    </div>    
    </div>
</div>
@include('partialsjob.footer')
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/digital-1-1.0.0/js/main.js')}}"></script>

</body>

</html>
</body> 

    