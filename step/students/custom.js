jQuery(document).ready(function () {



	
      
        

	$('#download').click(function () {
		html2canvas(document.querySelector('#invoice')).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			// console.log(base64image);
			let pdf = new jsPDF('l', 'in', [13, 8.5]);
			pdf.addImage(base64image, 'PNG', 1, 1, 11, 6.5);
			pdf.save('webtylepress-two.pdf');
		});
	});


     
      
	//////////////
	//////////////
	$('#btn-print').click(function () {
		// window.print();

		let wspFrame = document.getElementById('frame').contentWindow;
		wspFrame.focus();
		wspFrame.print();
	});
	//////////////
	//////////////

	$('#btn-one').click(function () {
		html2canvas(document.querySelector('#invoice')).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			// console.log(base64image);
			let pdf = new jsPDF('l', 'in', [13, 8.5]);
			pdf.addImage(base64image, 'PNG', 1, 1, 11, 6.5);
			pdf.save('class-schedule.pdf');
		});
	});
	//////////////
	//////////////
	$('#btn-two').click(function () {
		html2canvas(
			document
				.querySelector('iframe')
				.contentWindow.document.querySelector('.receipt-wrap'),
		).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			// console.log(base64image);
			let pdf = new jsPDF('p', 'px', [1600, 1131]);
			pdf.addImage(base64image, 'PNG', 15, 15, 1140, 966);
			pdf.save('webtylepress-receipt.pdf');
		});
	});
	//////////////
	//////////////
});
