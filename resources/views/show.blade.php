 
<html lang="{{ app()->getLocale() }}">
 
<head>
    <meta charset="utf-8">
 
    <title>TinyMCE in Laravel</title>
    <meta name="description" content="TinyMCE in Laravel">
    <meta name="author" content="NadjmanDev">
 
</head>
    <body>
        <input type="button"  class="btn btn-primary"  value="Create PDF" 
        id="btPrint" onclick="createPDF()" style="margin:2%" />

        <div id="content">
            {!! $content !!}
        </div>
    </body>



    <script>
        function createPDF() {
            var contetn = document.getElementById('content').innerHTML;
            
            // CREATE A WINDOW OBJECT.
            var win = window.open('', '', 'height=900,width=700');
            win.document.write('<html><head>');
            win.document.write(contetn); 
            win.document.write('</table>');
            // THE TABLE CONTENTS INSIDE THE BODY TAG.
            win.document.write('</body></html>');
            setTimeout(function(){win.print();},1000);
            win.document.close(); 	// CLOSE THE CURRENT WINDOW.
            // PRINT THE CONTENTS.
        }
    </script>
        
    
</html>
 
