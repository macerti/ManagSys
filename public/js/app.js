// ManagSys - Modern UI/UX Application JS

(function() {
  'use strict';

  // ===== INITIALIZATION =====
  document.addEventListener('DOMContentLoaded', init);

  function init() {
    setupNavigation();
    setupTooltips();
    setupFormValidation();
    setupMobileOptimizations();
    setupAnimations();
  }

  // ===== NAVIGATION SETUP =====
  function setupNavigation() {
    const currentPage = new URLSearchParams(window.location.search).get('page') || 'login';
    const navLinks = document.querySelectorAll('[data-page]');

    navLinks.forEach(link => {
      if (link.getAttribute('data-page') === currentPage) {
        link.classList.add('active');
      }
      
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const page = link.getAttribute('data-page');
        window.location.href = `index.php?page=${page}`;
      });
    });
  }

  // ===== TOOLTIP INITIALIZATION =====
  function setupTooltips() {
    const tooltips = document.querySelectorAll('[data-tooltip]');
    
    tooltips.forEach(element => {
      const tooltipText = element.getAttribute('data-tooltip');
      const container = document.createElement('div');
      container.className = 'tooltip-container';
      container.innerHTML = `<span class="tooltip-text">${tooltipText}</span>`;
      element.parentNode.insertBefore(container.firstChild, element);
      container.firstChild.appendChild(element);
    });
  }

  // ===== FORM VALIDATION =====
  function setupFormValidation() {
    const forms = document.querySelectorAll('form[novalidate]');

    forms.forEach(form => {
      form.addEventListener('submit', function(e) {
        if (!validateForm(this)) {
          e.preventDefault();
          showAlert('Please fill out all required fields', 'error');
        }
      });

      // Real-time validation
      const inputs = form.querySelectorAll('input, textarea, select');
      inputs.forEach(input => {
        input.addEventListener('blur', () => validateField(input));
      });
    });
  }

  function validateForm(form) {
    const fields = form.querySelectorAll('[required]');
    let isValid = true;

    fields.forEach(field => {
      if (!validateField(field)) {
        isValid = false;
      }
    });

    return isValid;
  }

  function validateField(field) {
    let isValid = true;

    // Check if field is empty
    if (field.hasAttribute('required') && !field.value.trim()) {
      isValid = false;
      field.style.borderColor = 'var(--color-error)';
    } else {
      field.style.borderColor = 'var(--color-border)';
    }

    // Email validation
    if (field.type === 'email' && field.value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(field.value)) {
        isValid = false;
        field.style.borderColor = 'var(--color-error)';
      }
    }

    // Password minimum length
    if (field.type === 'password' && field.hasAttribute('minlength')) {
      const minLength = parseInt(field.getAttribute('minlength'));
      if (field.value.length < minLength) {
        isValid = false;
        field.style.borderColor = 'var(--color-error)';
      }
    }

    return isValid;
  }

  // ===== MOBILE OPTIMIZATIONS =====
  function setupMobileOptimizations() {
    // Add touch feedback
    const buttons = document.querySelectorAll('button, a.btn');
    buttons.forEach(button => {
      button.addEventListener('touchstart', function() {
        this.style.opacity = '0.8';
      });
      button.addEventListener('touchend', function() {
        this.style.opacity = '1';
      });
    });

    // Prevent double-tap zoom on buttons
    document.addEventListener('touchend', function(e) {
      if (e.target.tagName === 'BUTTON' || e.target.closest('button') || e.target.classList.contains('btn')) {
        e.preventDefault();
      }
    }, false);

    // Viewport height fix for mobile browsers
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    window.addEventListener('resize', () => {
      const vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    });
  }

  // ===== ANIMATIONS =====
  function setupAnimations() {
    // Observe elements for animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.animation = 'slideUp 0.3s ease-out forwards';
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.card, .alert').forEach(el => observer.observe(el));
  }

  // ===== ALERT SYSTEM =====
  window.showAlert = function(message, type = 'info') {
    const alertContainer = document.getElementById('alert-container') || createAlertContainer();
    
    const alert = document.createElement('div');
    alert.className = `alert alert-${type}`;
    alert.innerHTML = `
      <span>${message}</span>
      <button onclick="this.parentElement.remove()" style="background: none; border: none; color: inherit; cursor: pointer; font-size: 1.2rem; padding: 0;">×</button>
    `;

    alertContainer.appendChild(alert);

    // Auto-remove after 5 seconds
    setTimeout(() => {
      alert.style.animation = 'slideUp 0.3s ease-out reverse forwards';
      setTimeout(() => alert.remove(), 300);
    }, 5000);
  };

  function createAlertContainer() {
    const container = document.createElement('div');
    container.id = 'alert-container';
    container.style.cssText = `
      position: fixed;
      top: 0;
      right: 0;
      z-index: 10000;
      max-width: 90%;
      width: 400px;
      padding: 1rem;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    `;
    document.body.appendChild(container);
    return container;
  }

  // ===== UTILITY: Active page detection =====
  window.isCurrentPage = function(page) {
    const currentPage = new URLSearchParams(window.location.search).get('page') || 'login';
    return currentPage === page;
  };
})();
