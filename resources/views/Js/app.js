/* app.js
   Separate JS for tabs, modal, theme, logout and small UX.
*/

(() => {
    // Helper selectors
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = {
        dashboard: document.getElementById('content-dashboard'),
        projects: document.getElementById('content-projects'),
        statistics: document.getElementById('content-statistics'),
        settings: document.getElementById('content-settings'),
    };

    const pageTitle = document.getElementById('page-title');
    const newProjectBtn = document.getElementById('new-project-btn');
    const modal = document.getElementById('modal');
    const modalClose = document.getElementById('modal-close');
    const modalCancel = document.getElementById('modal-cancel');

    // Theme elements
    const rootHtml = document.documentElement;
    const THEME_KEY = 'smeta_theme';
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const themeToggleSidebar = document.getElementById('theme-toggle-sidebar');
    const sidebarThemeIcon = document.getElementById('sidebar-theme-icon');

    // Logout
    const logoutBtn = document.getElementById('logout-btn');

    // Initialize theme from localStorage or prefers-color-scheme
    function getPreferredTheme() {
        const stored = localStorage.getItem(THEME_KEY);
        if (stored) return stored;
        return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    function applyTheme(theme) {
        if (theme === 'dark') {
            rootHtml.classList.add('dark');
            document.body.classList.add('bg-slate-900');
            // swap icons to moon/sun representation (we use same path, but change rotation/color)
            themeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>`;
            sidebarThemeIcon.innerHTML = themeIcon.innerHTML;
        } else {
            rootHtml.classList.remove('dark');
            document.body.classList.remove('bg-slate-900');
            themeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1M12 20v1M4.2 4.2l.7.7M19.1 19.1l.7.7M1 12h1M22 12h1M4.2 19.8l.7-.7M19.1 4.9l.7-.7M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10z"/>`;
            sidebarThemeIcon.innerHTML = themeIcon.innerHTML;
        }
    }

    function toggleTheme() {
        const current = getPreferredTheme();
        const next = current === 'dark' ? 'light' : 'dark';
        localStorage.setItem(THEME_KEY, next);
        applyTheme(next);
    }

    // Setup theme toggles
    themeToggle?.addEventListener('click', toggleTheme);
    themeToggleSidebar?.addEventListener('click', toggleTheme);

    // Initialize on load
    applyTheme(getPreferredTheme());

    // TAB logic
    function setActiveTab(tab) {
        // update title
        const titles = {
            dashboard: 'Dashboard',
            projects: 'Mening loyihalarim',
            statistics: 'Statistika',
            settings: 'Sozlamalar'
        };
        pageTitle.innerText = titles[tab] || 'Dashboard';

        // show/hide new-project button only for projects
        if (newProjectBtn) newProjectBtn.classList.toggle('hidden', tab !== 'projects');

        // toggle content visibility
        for (const [k, el] of Object.entries(contents)) {
            if (!el) continue;
            if (k === tab) el.classList.remove('hidden'); else el.classList.add('hidden');
        }

        // update sidebar active classes
        tabs.forEach(btn => {
            const t = btn.dataset.tab;
            if (t === tab) {
                btn.classList.add('active-tab');
            } else {
                btn.classList.remove('active-tab');
            }
        });

        // set url hash without reload
        if (history.replaceState) history.replaceState(null, '', `#${tab}`);
    }

    tabs.forEach(btn => {
        btn.addEventListener('click', () => setActiveTab(btn.dataset.tab));
    });

    // initialize from hash or default
    const initialTab = (location.hash && location.hash.substring(1)) || 'dashboard';
    setActiveTab(initialTab);

    // MODAL handlers
    function openModal() {
        if (!modal) return;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // lock scroll
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        if (!modal) return;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.getElementById('new-project-btn')?.addEventListener('click', openModal);
    modalClose?.addEventListener('click', closeModal);
    modalCancel?.addEventListener('click', closeModal);

    // close modal on backdrop click
    modal?.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // KEY: Esc closes modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (!modal.classList.contains('hidden')) closeModal();
        }
    });

    // LOGOUT handler (simulate)
    logoutBtn?.addEventListener('click', async (e) => {
        e.preventDefault();
        const ok = confirm('Chiqishni tasdiqlaysizmi?');
        if (!ok) return;
        // Show visual feedback
        logoutBtn.disabled = true;
        logoutBtn.classList.add('opacity-60');
        // In a real app you would call your backend logout endpoint here, e.g.:
        // await fetch('/logout', { method: 'POST', credentials: 'include' });
        // For now simulate with 700ms then redirect to homepage
        setTimeout(() => {
            // Reset UI for demo
            logoutBtn.disabled = false;
            logoutBtn.classList.remove('opacity-60');
            // Redirect (change as needed)
            window.location.href = '/'; // or your post-logout redirect
        }, 700);
    });

    // Profile save (demo)
    document.getElementById('save-profile')?.addEventListener('click', () => {
        const name = document.getElementById('input-name').value;
        const email = document.getElementById('input-email').value;
        // In real app: send to backend. Here just show toast
        showToast('Profil saqlandi', `Ism: ${name} — Email: ${email}`);
    });

    // small toast utility
    function showToast(title, text = '') {
        const t = document.createElement('div');
        t.className = 'fixed right-6 bottom-6 bg-white dark:bg-slate-800 text-gray-900 dark:text-gray-100 px-4 py-3 rounded-lg shadow-lg border dark:border-slate-700';
        t.innerHTML = `<div class="font-semibold">${title}</div><div class="text-sm mt-1">${text}</div>`;
        document.body.appendChild(t);
        setTimeout(() => t.classList.add('opacity-0', 'translate-y-4'), 2000);
        setTimeout(() => t.remove(), 3000);
    }

    // Add click-to-open for project items to show details (demo)
    document.querySelectorAll('.project-item').forEach(item => {
        item.addEventListener('click', () => {
            // navigate to projects tab and maybe open project detail modal in real app
            setActiveTab('projects');
            showToast('Loyiha ochildi', 'Siz loyihani ko‘ryapsiz (demo).');
        });
    });

    // Accessibility: focus outlines for keyboard users
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') document.body.classList.add('user-is-tabbing');
    });
})();
