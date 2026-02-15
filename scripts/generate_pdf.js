#!/usr/bin/env node

/**
 * Script pour générer le PDF depuis le fichier HTML
 * Usage: node scripts/generate_pdf.js
 * 
 * Dépendance: puppeteer ou html2pdf
 * Install: npm install puppeteer
 */

const fs = require('fs');
const path = require('path');

console.log('[PDF Generator] Démarrage du script de génération PDF...');

// Chemin du fichier HTML
const htmlPath = path.join(__dirname, '../ETUDE_TECHNIQUE_COMPLETE.html');

// Chemin de sortie du PDF
const pdfPath = path.join(__dirname, '../ETUDE_TECHNIQUE_COMPLETE.pdf');

// Vérification du fichier HTML
if (!fs.existsSync(htmlPath)) {
    console.error(`[PDF Generator] Erreur: Le fichier HTML n'existe pas: ${htmlPath}`);
    process.exit(1);
}

console.log('[PDF Generator] Fichier HTML trouvé:', htmlPath);

// Tentative avec Puppeteer
try {
    const puppeteer = require('puppeteer');
    
    (async () => {
        try {
            console.log('[PDF Generator] Lancement de Puppeteer...');
            const browser = await puppeteer.launch({
                headless: 'new',
                args: ['--no-sandbox', '--disable-setuid-sandbox']
            });
            
            const page = await browser.newPage();
            
            // Charge le fichier HTML
            const htmlContent = fs.readFileSync(htmlPath, 'utf-8');
            
            console.log('[PDF Generator] Chargement du contenu HTML...');
            await page.setContent(htmlContent, { waitUntil: 'networkidle2' });
            
            // Options du PDF
            const pdfOptions = {
                path: pdfPath,
                format: 'A4',
                margin: {
                    top: '0.5in',
                    bottom: '0.5in',
                    left: '0.5in',
                    right: '0.5in'
                },
                printBackground: true,
                scale: 1
            };
            
            console.log('[PDF Generator] Génération du PDF...');
            await page.pdf(pdfOptions);
            
            await browser.close();
            
            console.log('[PDF Generator] ✓ PDF généré avec succès!');
            console.log(`[PDF Generator] Fichier: ${pdfPath}`);
            console.log(`[PDF Generator] Taille: ${fs.statSync(pdfPath).size / 1024} KB`);
            
        } catch (error) {
            console.error('[PDF Generator] Erreur Puppeteer:', error.message);
            process.exit(1);
        }
    })();
    
} catch (error) {
    console.error('[PDF Generator] Puppeteer non installé');
    console.log('[PDF Generator] Instructions d\'installation:');
    console.log('  npm install puppeteer');
    console.log('\nAlternativement, vous pouvez:');
    console.log('  1. Ouvrir ETUDE_TECHNIQUE_COMPLETE.html dans votre navigateur');
    console.log('  2. Appuyer sur Ctrl+P (ou Cmd+P)');
    console.log('  3. Sélectionner "Enregistrer en tant que PDF"');
    process.exit(1);
}
