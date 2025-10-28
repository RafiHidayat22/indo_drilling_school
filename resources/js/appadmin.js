import './bootstrap';
import './admin.js';

import Quill from 'quill';
import 'quill/dist/quill.snow.css';

window.Quill = Quill;


// Import article manager
import { initArticleManagement } from './admin.js';

// Initialize saat DOM ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ DOM Ready');
    console.log('✅ Quill available:', typeof window.Quill !== 'undefined');
    
    // Cek apakah di halaman article management
    if (document.querySelector('#editorAdd') || document.querySelector('#editorEdit')) {
        initArticleManagement();
        console.log('✅ Article management initialized');
    }
});