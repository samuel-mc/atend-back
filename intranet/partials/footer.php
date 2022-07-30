    </body>
</html>

<script src='<?php echo __ROOT__; ?>/assets/js/jsPDF/dist/jspdf.min.js'></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>

<script> //Script para generar el pdf
    const generarPdf = (name = "Servicios") => {
        let pdf = new jsPDF();
        pdf.autoTable({
            html: '#tablaServicios'
        });
        pdf.save(name+'.pdf');
    }
    const generarPdfBitacora = (name = "Bitacora") => {
        let pdf = new jsPDF();
        pdf.autoTable({
            html: '#tablaBitacora'
        });
        pdf.save(name+'.pdf');
    }
</script>


