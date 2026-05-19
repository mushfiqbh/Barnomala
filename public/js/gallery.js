// Simple Gallery JavaScript Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize fade-in animations
    initializeFadeInAnimations();
});

function initializeFadeInAnimations() {
    const items = document.querySelectorAll('.animate-fadeInUp');
    items.forEach((item, index) => {
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, index * 100);
    });
}

// Simple Modal Functions
function openSimpleModal(imageSrc, caption) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalCaption = document.getElementById('modalCaption');
    
    modalImage.src = imageSrc;
    modalCaption.textContent = caption;
    
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.add('opacity-100');
        modal.classList.remove('opacity-0');
    }, 10);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
    
    // Close on Escape key
    document.addEventListener('keydown', handleEscapeKey);
}

function closeSimpleModal() {
    const modal = document.getElementById('imageModal');
    
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
    
    // Remove escape key listener
    document.removeEventListener('keydown', handleEscapeKey);
}

function handleEscapeKey(e) {
    if (e.key === 'Escape') {
        closeSimpleModal();
    }
}

// Share Function
function shareImage(imageSrc, caption) {
    if (navigator.share) {
        navigator.share({
            title: caption,
            text: 'চেক করুন এই সুন্দর ছবিটি!',
            url: window.location.origin + imageSrc
        }).catch(err => {
            // Fallback to clipboard if sharing fails
            copyToClipboard(imageSrc, caption);
        });
    } else {
        // Fallback to clipboard
        copyToClipboard(imageSrc, caption);
    }
}

function copyToClipboard(imageSrc, caption) {
    const shareText = `${caption} - ${window.location.origin}${imageSrc}`;
    
    if (navigator.clipboard) {
        navigator.clipboard.writeText(shareText).then(() => {
            showNotification('লিংক কপি হয়েছে!');
        }).catch(() => {
            // Fallback for older browsers
            fallbackCopyToClipboard(shareText);
        });
    } else {
        fallbackCopyToClipboard(shareText);
    }
}

function fallbackCopyToClipboard(text) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    textArea.style.position = 'fixed';
    textArea.style.left = '-999999px';
    textArea.style.top = '-999999px';
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        document.execCommand('copy');
        showNotification('লিংক কপি হয়েছে!');
    } catch (err) {
        showNotification('কপি করতে ব্যর্থ হয়েছে');
    }
    
    document.body.removeChild(textArea);
}

function showNotification(message) {
    // Remove existing notification
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    const notification = document.createElement('div');
    notification.className = 'notification fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-[100] transform translate-x-full transition-transform duration-300';
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Slide in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Slide out and remove
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 300);
    }, 3000);
}

// Touch/Swipe Support for Mobile Modal
let touchStartX = 0;
let touchStartY = 0;

document.addEventListener('touchstart', function(e) {
    touchStartX = e.changedTouches[0].clientX;
    touchStartY = e.changedTouches[0].clientY;
});

document.addEventListener('touchend', function(e) {
    const touchEndX = e.changedTouches[0].clientX;
    const touchEndY = e.changedTouches[0].clientY;
    const modal = document.getElementById('imageModal');
    
    if (!modal.classList.contains('hidden')) {
        const deltaX = touchEndX - touchStartX;
        const deltaY = touchEndY - touchStartY;
        
        // If swipe down is greater than threshold, close modal
        if (deltaY > 100 && Math.abs(deltaX) < 100) {
            closeSimpleModal();
        }
    }
});

// Initialize CSS animations
const style = document.createElement('style');
style.textContent = `
    .animate-fadeInUp {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    
    .notification {
        z-index: 9999 !important;
    }
`;
document.head.appendChild(style);