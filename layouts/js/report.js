document.addEventListener('DOMContentLoaded', function() {
    function myFunction() {
        setTimeout(showPage, 3000);
    }
    
    function showPage() {
        var loader = document.getElementById("loader");
        var medicalReport = document.querySelector(".medical-report");
    
        if (loader && medicalReport) {
            loader.style.display = "none";
            medicalReport.style.display = "block";
        } else {
            console.error("Loader or medical report element not found.");
        }
    }
    
    myFunction(); // Call myFunction here to start the timer on DOMContentLoaded
    document.getElementById('downloadPdf').addEventListener('click', function() {
        var medicalReport = document.querySelector('.medical-report');
        var opt = {
            margin: 0.5,
            filename: 'medical_report.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(medicalReport).set(opt).save();
    });
});


