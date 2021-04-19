window.pdfMake = require('pdfmake/build/pdfmake.js');
window.pdfFonts = require('pdfmake/build/vfs_fonts.js');
pdfMake.vfs = pdfFonts.pdfMake.vfs;
