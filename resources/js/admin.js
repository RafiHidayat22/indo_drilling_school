document.addEventListener('DOMContentLoaded', function() {
    // Profile Dropdown Toggle
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileBtn.contains(e.target)) {
                profileDropdown.classList.remove('show');
            }
        });
    }

    // Fullscreen Toggle
    const fullscreenBtn = document.getElementById('fullscreenBtn');
    if (fullscreenBtn) {
        fullscreenBtn.addEventListener('click', function() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(err => {
                    console.log(`Error attempting to enable full-screen mode: ${err.message}`);
                });
                this.querySelector('i').classList.replace('fa-expand', 'fa-compress');
            } else {
                document.exitFullscreen();
                this.querySelector('i').classList.replace('fa-compress', 'fa-expand');
            }
        });
    }

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            if (sidebar) {
                sidebar.classList.toggle('show');
            }
        });
    }

    // Keyboard Shortcut for Search (Ctrl+K)
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.querySelector('.search-box input');
            if (searchInput) {
                searchInput.focus();
            }
        }
    });

    // Modal Functions
    window.openAddModal = function() {
        const modal = document.getElementById('addModal');
        if (modal) {
            modal.classList.remove('hidden');
        }
    };

    window.closeAddModal = function() {
        const modal = document.getElementById('addModal');
        if (modal) {
            modal.classList.add('hidden');
        }
    };

    window.openEditModal = function(id) {
        const modal = document.getElementById('editModal');
        if (modal) {
            modal.classList.remove('hidden');
        }
    };

    window.closeEditModal = function() {
        const modal = document.getElementById('editModal');
        if (modal) {
            modal.classList.add('hidden');
        }
    };

    window.confirmDelete = function(id) {
        const modal = document.getElementById('deleteModal');
        if (modal) {
            modal.classList.remove('hidden');
        }
    };

    window.closeDeleteModal = function() {
        const modal = document.getElementById('deleteModal');
        if (modal) {
            modal.classList.add('hidden');
        }
    };

    // Close modals when clicking outside
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    });
});
// resources/js/article-manager.js
// resources/js/article-manager.js
export function initArticleManagement() {
    if (typeof Quill === 'undefined') {
        console.error('❌ Quill not loaded!');
        return;
    }

    function initQuill(selector, inputId, initialValue = '') {
        const container = document.querySelector(selector);
        if (!container) {
            console.error(`Container ${selector} not found`);
            return null;
        }

        // ✅ Hapus toolbar lama jika ada
        const existingToolbar = container.previousElementSibling;
        if (existingToolbar && existingToolbar.classList.contains('ql-toolbar')) {
            existingToolbar.remove();
        }

        // ✅ Reset container innerHTML
        container.innerHTML = initialValue || '';

        const quill = new Quill(selector, {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'header': [1, 2, 3, false] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link'], // ❌ HAPUS 'image' dari sini
                    ['clean']
                ]
            }
        });

        if (initialValue) {
            quill.root.innerHTML = initialValue;
        }

        // Sync to hidden input
        quill.on('text-change', function() {
            const input = document.getElementById(inputId);
            if (input) {
                input.value = quill.root.innerHTML;
            }
        });

        return quill;
    }

    // ... sisanya tetap sama
    let quillAdd = null;
    let quillEdit = null;

    window.openAddModal = function() {
        const modal = document.getElementById('addModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            if (quillAdd) {
                const container = document.querySelector('#editorAdd');
                const toolbar = container.previousElementSibling;
                if (toolbar && toolbar.classList.contains('ql-toolbar')) {
                    toolbar.remove();
                }
                quillAdd = null;
            }
            
            quillAdd = initQuill('#editorAdd', 'contentAddInput');
            console.log('✅ Quill Add initialized');
        }, 150);
    };

    window.openEditModal = function(id) {
        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            if (quillEdit) {
                const container = document.querySelector('#editorEdit');
                const toolbar = container.previousElementSibling;
                if (toolbar && toolbar.classList.contains('ql-toolbar')) {
                    toolbar.remove();
                }
                quillEdit = null;
            }
            
            const editorEl = document.getElementById('editorEdit');
            const initial = editorEl ? editorEl.textContent.trim() : '';
            quillEdit = initQuill('#editorEdit', 'contentEditInput', initial);
            console.log('✅ Quill Edit initialized');
        }, 150);
    };

    window.closeAddModal = function() {
        const modal = document.getElementById('addModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        
        if (quillAdd) {
            const container = document.querySelector('#editorAdd');
            if (container) {
                const toolbar = container.previousElementSibling;
                if (toolbar && toolbar.classList.contains('ql-toolbar')) {
                    toolbar.remove();
                }
                container.innerHTML = '';
            }
            quillAdd = null;
        }
    };

    window.closeEditModal = function() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        
        if (quillEdit) {
            const container = document.querySelector('#editorEdit');
            if (container) {
                const toolbar = container.previousElementSibling;
                if (toolbar && toolbar.classList.contains('ql-toolbar')) {
                    toolbar.remove();
                }
                container.innerHTML = 'Konten artikel yang sedang diedit...';
            }
            quillEdit = null;
        }
    };

    window.confirmDelete = (id) => {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.closeDeleteModal = () => {
        document.getElementById('deleteModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    };

    window.viewArticle = (id) => alert('View: ' + id);

    // Event delegation untuk action buttons
    const tbody = document.querySelector('tbody');
    if (tbody) {
        tbody.addEventListener('click', function(e) {
            const btn = e.target.closest('button[data-action]');
            if (!btn) return;
            
            const action = btn.dataset.action;
            const id = btn.dataset.articleId;
            
            if (action === 'edit') window.openEditModal(id);
            else if (action === 'delete') window.confirmDelete(id);
            else if (action === 'view') window.viewArticle(id);
        });
    }

    // Close modals on outside click
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                if (this.id === 'addModal') window.closeAddModal();
                else if (this.id === 'editModal') window.closeEditModal();
                else if (this.id === 'deleteModal') window.closeDeleteModal();
            }
        });
    });
}
// Global function to handle modal close and refresh
window.refreshPageAfterSubmit = function() {
    // Jika Anda ingin reload halaman
    location.reload();

    // Atau jika ingin refresh hanya bagian tertentu (misal: table)
    // document.getElementById('table-container').innerHTML = '<div>Loading...</div>';
    // fetch(window.location.href)
    //     .then(res => res.text())
    //     .then(html => {
    //         const parser = new DOMParser();
    //         const doc = parser.parseFromString(html, 'text/html');
    //         document.getElementById('table-container').replaceWith(doc.getElementById('table-container'));
    //     });
};

// Untuk meng-handle form submit di dalam modal
document.addEventListener('DOMContentLoaded', function() {
    // Jika ada form di dalam modal
    document.addEventListener('submit', function(e) {
        if (e.target.closest('.modal-form')) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            // Tampilkan loading
            const modal = form.closest('.modal-content');
            if (modal) {
                modal.querySelector('.loading-spinner')?.classList.remove('hidden');
            }

            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (response.ok) return response.json();
                throw new Error('Gagal menyimpan data.');
            })
            .then(data => {
                if (data.success) {
                    alert(data.message || 'Data berhasil disimpan!');
                    window.refreshPageAfterSubmit();
                } else {
                    alert(data.message || 'Terjadi kesalahan.');
                }
            })
            .catch(err => {
                alert('Error: ' + err.message);
            })
            .finally(() => {
                if (modal) {
                    modal.querySelector('.loading-spinner')?.classList.add('hidden');
                }
            });
        }
    });
});