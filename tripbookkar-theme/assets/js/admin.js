/**
 * TripBookKar Theme Admin JavaScript
 * 
 * @package TripBookKar
 * @version 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        initializeColorPickers();
        initializeDemoImporter();
        initializeImageUploader();
        initializeTabSwitching();
        initializeFormValidation();
    });

    /**
     * Initialize Color Pickers
     */
    function initializeColorPickers() {
        $('.color-picker').wpColorPicker({
            change: function(event, ui) {
                const color = ui.color.toString();
                const $input = $(this);
                
                // Update preview if exists
                const previewTarget = $input.data('preview');
                if (previewTarget) {
                    $(previewTarget).css('background-color', color);
                }
                
                // Show save notice
                showSaveNotice();
            }
        });
    }

    /**
     * Initialize Demo Importer
     */
    function initializeDemoImporter() {
        $('#import-demo-content').on('click', function(e) {
            e.preventDefault();
            
            const $button = $(this);
            const $status = $('#import-status');
            
            if (!confirm('This will import demo content including destinations, packages, and testimonials. Continue?')) {
                return;
            }
            
            // Show loading state
            $button.prop('disabled', true).text('Importing...');
            $status.html('<div class="notice notice-info"><p>Importing demo content...</p></div>');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'tripbookkar_import_demo',
                    nonce: $('#demo_import_nonce').val()
                },
                success: function(response) {
                    if (response.success) {
                        $status.html('<div class="notice notice-success"><p>Demo content imported successfully!</p></div>');
                        
                        // Reload page after short delay
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        $status.html('<div class="notice notice-error"><p>Import failed: ' + (response.data || 'Unknown error') + '</p></div>');
                    }
                },
                error: function() {
                    $status.html('<div class="notice notice-error"><p>Import failed due to server error.</p></div>');
                },
                complete: function() {
                    $button.prop('disabled', false).text('Import Demo Content');
                }
            });
        });
    }

    /**
     * Initialize Image Uploader
     */
    function initializeImageUploader() {
        $('.upload-image-button').on('click', function(e) {
            e.preventDefault();
            
            const $button = $(this);
            const $input = $button.siblings('input[type="text"]');
            const $preview = $button.siblings('.image-preview');
            
            // Create media uploader
            const mediaUploader = wp.media({
                title: 'Select Image',
                button: {
                    text: 'Use Image'
                },
                multiple: false
            });
            
            // When image is selected
            mediaUploader.on('select', function() {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                
                // Update input value
                $input.val(attachment.url);
                
                // Update preview
                if ($preview.length) {
                    $preview.html('<img src="' + attachment.url + '" style="max-width: 200px; height: auto;">');
                }
                
                // Show save notice
                showSaveNotice();
            });
            
            // Open media uploader
            mediaUploader.open();
        });
        
        // Remove image button
        $('.remove-image-button').on('click', function(e) {
            e.preventDefault();
            
            const $button = $(this);
            const $input = $button.siblings('input[type="text"]');
            const $preview = $button.siblings('.image-preview');
            
            // Clear input and preview
            $input.val('');
            $preview.empty();
            
            // Show save notice
            showSaveNotice();
        });
    }

    /**
     * Initialize Tab Switching
     */
    function initializeTabSwitching() {
        $('.nav-tab').on('click', function(e) {
            e.preventDefault();
            
            const $tab = $(this);
            const target = $tab.attr('href');
            
            // Update active tab
            $('.nav-tab').removeClass('nav-tab-active');
            $tab.addClass('nav-tab-active');
            
            // Show target content
            $('.tab-content').hide();
            $(target).show();
        });
    }

    /**
     * Initialize Form Validation
     */
    function initializeFormValidation() {
        // API key validation
        $('input[name*="api_key"], input[name*="api_secret"]').on('blur', function() {
            const $input = $(this);
            const value = $input.val().trim();
            
            if (value.length > 0 && value.length < 10) {
                showFieldError($input, 'API key appears to be too short');
            } else {
                clearFieldError($input);
            }
        });
        
        // Email validation
        $('input[type="email"]').on('blur', function() {
            const $input = $(this);
            const email = $input.val().trim();
            
            if (email.length > 0 && !isValidEmail(email)) {
                showFieldError($input, 'Please enter a valid email address');
            } else {
                clearFieldError($input);
            }
        });
        
        // Phone validation
        $('input[name*="phone"]').on('blur', function() {
            const $input = $(this);
            const phone = $input.val().trim();
            
            if (phone.length > 0 && !isValidPhone(phone)) {
                showFieldError($input, 'Please enter a valid phone number');
            } else {
                clearFieldError($input);
            }
        });
    }

    /**
     * Show field error
     */
    function showFieldError($input, message) {
        clearFieldError($input);
        
        $input.addClass('error');
        $input.after('<div class="field-error" style="color: #dc3232; font-size: 12px; margin-top: 5px;">' + message + '</div>');
    }

    /**
     * Clear field error
     */
    function clearFieldError($input) {
        $input.removeClass('error');
        $input.siblings('.field-error').remove();
    }

    /**
     * Show save notice
     */
    function showSaveNotice() {
        if (!$('.save-notice').length) {
            $('form').prepend('<div class="save-notice notice notice-warning"><p>You have unsaved changes. Don\'t forget to save!</p></div>');
        }
    }

    /**
     * Validate email
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    /**
     * Validate phone
     */
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        return phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''));
    }

    /**
     * Test API Connection
     */
    function testAPIConnection(apiType) {
        const $button = $('#test-' + apiType + '-api');
        const $status = $('#' + apiType + '-api-status');
        
        $button.prop('disabled', true).text('Testing...');
        $status.html('<span style="color: #666;">Testing connection...</span>');
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'test_api_connection',
                api_type: apiType,
                nonce: $('#api_test_nonce').val()
            },
            success: function(response) {
                if (response.success) {
                    $status.html('<span style="color: #46b450;">✓ Connection successful</span>');
                } else {
                    $status.html('<span style="color: #dc3232;">✗ Connection failed: ' + (response.data || 'Unknown error') + '</span>');
                }
            },
            error: function() {
                $status.html('<span style="color: #dc3232;">✗ Connection test failed</span>');
            },
            complete: function() {
                $button.prop('disabled', false).text('Test Connection');
            }
        });
    }

    // Bind test API buttons
    $(document).on('click', '.test-api-button', function(e) {
        e.preventDefault();
        const apiType = $(this).data('api-type');
        testAPIConnection(apiType);
    });

    /**
     * Clear Cache
     */
    $('#clear-cache').on('click', function(e) {
        e.preventDefault();
        
        const $button = $(this);
        
        $button.prop('disabled', true).text('Clearing...');
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'clear_theme_cache',
                nonce: $('#cache_nonce').val()
            },
            success: function(response) {
                if (response.success) {
                    alert('Cache cleared successfully!');
                } else {
                    alert('Failed to clear cache: ' + (response.data || 'Unknown error'));
                }
            },
            error: function() {
                alert('Failed to clear cache due to server error.');
            },
            complete: function() {
                $button.prop('disabled', false).text('Clear Cache');
            }
        });
    });

    /**
     * Export Settings
     */
    $('#export-settings').on('click', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'export_theme_settings',
                nonce: $('#export_nonce').val()
            },
            success: function(response) {
                if (response.success) {
                    // Create download link
                    const blob = new Blob([JSON.stringify(response.data, null, 2)], {
                        type: 'application/json'
                    });
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'tripbookkar-settings.json';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);
                } else {
                    alert('Export failed: ' + (response.data || 'Unknown error'));
                }
            },
            error: function() {
                alert('Export failed due to server error.');
            }
        });
    });

    /**
     * Import Settings
     */
    $('#import-settings-file').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                try {
                    const settings = JSON.parse(e.target.result);
                    importSettings(settings);
                } catch (error) {
                    alert('Invalid settings file format.');
                }
            };
            reader.readAsText(file);
        }
    });

    /**
     * Import Settings Function
     */
    function importSettings(settings) {
        if (!confirm('This will overwrite your current settings. Continue?')) {
            return;
        }
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'import_theme_settings',
                settings: JSON.stringify(settings),
                nonce: $('#import_nonce').val()
            },
            success: function(response) {
                if (response.success) {
                    alert('Settings imported successfully! The page will reload.');
                    window.location.reload();
                } else {
                    alert('Import failed: ' + (response.data || 'Unknown error'));
                }
            },
            error: function() {
                alert('Import failed due to server error.');
            }
        });
    }

    /**
     * Real-time Preview
     */
    function initializeRealTimePreview() {
        // Color changes
        $('.color-picker').on('change', function() {
            const color = $(this).val();
            const property = $(this).data('css-property');
            const target = $(this).data('preview-target');
            
            if (target && property) {
                $(target).css(property, color);
            }
        });
        
        // Text changes
        $('input[data-preview-target]').on('input', function() {
            const text = $(this).val();
            const target = $(this).data('preview-target');
            
            if (target) {
                $(target).text(text);
            }
        });
    }

    // Initialize real-time preview if on customizer page
    if ($('.wp-customizer').length) {
        initializeRealTimePreview();
    }

    /**
     * Bulk Actions
     */
    $('#bulk-action-apply').on('click', function(e) {
        e.preventDefault();
        
        const action = $('#bulk-actions').val();
        const selected = [];
        
        $('.bulk-checkbox:checked').each(function() {
            selected.push($(this).val());
        });
        
        if (selected.length === 0) {
            alert('Please select items to perform bulk action.');
            return;
        }
        
        if (!confirm('Are you sure you want to perform this action on ' + selected.length + ' items?')) {
            return;
        }
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'tripbookkar_bulk_action',
                bulk_action: action,
                items: selected,
                nonce: $('#bulk_nonce').val()
            },
            success: function(response) {
                if (response.success) {
                    alert('Bulk action completed successfully!');
                    window.location.reload();
                } else {
                    alert('Bulk action failed: ' + (response.data || 'Unknown error'));
                }
            },
            error: function() {
                alert('Bulk action failed due to server error.');
            }
        });
    });

    /**
     * Select All Checkbox
     */
    $('#select-all').on('change', function() {
        $('.bulk-checkbox').prop('checked', $(this).prop('checked'));
    });

    /**
     * Help tooltips
     */
    $('.help-tooltip').on('mouseenter', function() {
        const helpText = $(this).data('help');
        const tooltip = $('<div class="admin-tooltip">' + helpText + '</div>');
        
        $('body').append(tooltip);
        
        const pos = $(this).offset();
        tooltip.css({
            top: pos.top - tooltip.outerHeight() - 10,
            left: pos.left + ($(this).outerWidth() / 2) - (tooltip.outerWidth() / 2),
            position: 'absolute',
            background: '#333',
            color: '#fff',
            padding: '8px 12px',
            borderRadius: '4px',
            fontSize: '12px',
            zIndex: 9999,
            maxWidth: '200px'
        }).fadeIn();
    }).on('mouseleave', function() {
        $('.admin-tooltip').fadeOut(function() {
            $(this).remove();
        });
    });

    /**
     * Auto-save settings
     */
    let autoSaveTimeout;
    $('.auto-save').on('input change', function() {
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout = setTimeout(function() {
            autoSaveSettings();
        }, 2000);
    });

    function autoSaveSettings() {
        const formData = new FormData($('#tripbookkar-settings-form')[0]);
        formData.append('action', 'auto_save_settings');
        formData.append('nonce', $('#auto_save_nonce').val());
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#auto-save-status').html('<span style="color: #46b450;">Settings auto-saved</span>').fadeIn().delay(2000).fadeOut();
                }
            }
        });
    }

})(jQuery);