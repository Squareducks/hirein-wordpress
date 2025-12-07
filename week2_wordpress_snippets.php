<?php
// Week 2 Implementation: Content Modification Snippets
// Generated automatically from semantic linking map


// Content modification for: Complete Guide to Lifting Equipment
// Post slug: lifting-equipment-guide
// Links to insert: 8

function modify_content_lifting_equipment_guide($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'lifting-equipment-guide') {
        return $content;
    }
    
    // Priority 1: lifting equipment hire (Score: 0.833)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: lifting gear hire (Score: 0.667)
    $anchor_options = ["lifting gear hire", "professional lifting gear hire", "quality lifting gear hire", "lifting gear hire services"];
    $target_url = home_url('https://hirein.co.uk/lifting-gear-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: equipment hire (Score: 0.5)
    $anchor_options = ["equipment hire", "construction equipment rental", "professional equipment hire", "hire construction equipment", "equipment rental services"];
    $target_url = home_url('https://hirein.co.uk/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: cheap ladder hire (Score: 0.5)
    $anchor_options = ["cheap ladder hire", "professional cheap ladder hire", "quality cheap ladder hire", "cheap ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/cheap-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: platform ladder hire (Score: 0.5)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: youngman ladder hire (Score: 0.5)
    $anchor_options = ["youngman ladder hire", "professional youngman ladder hire", "quality youngman ladder hire", "youngman ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/youngman-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: scaffold hire prices (Score: 0.5)
    $anchor_options = ["scaffold hire prices", "professional scaffold hire prices", "quality scaffold hire prices", "scaffold hire prices services"];
    $target_url = home_url('https://hirein.co.uk/scaffold-hire-prices/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: step ladder hire (Score: 0.5)
    $anchor_options = ["step ladder hire", "professional step ladder hire", "quality step ladder hire", "step ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/step-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_lifting_equipment_guide', 15);


// Content modification for: Equipment Maintenance Best Practices
// Post slug: equipment-maintenance
// Links to insert: 8

function modify_content_equipment_maintenance($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'equipment-maintenance') {
        return $content;
    }
    
    // Priority 1: lifting equipment hire (Score: 0.769)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: cheap ladder hire (Score: 0.615)
    $anchor_options = ["cheap ladder hire", "professional cheap ladder hire", "quality cheap ladder hire", "cheap ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/cheap-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: platform ladder hire (Score: 0.615)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: youngman ladder hire (Score: 0.615)
    $anchor_options = ["youngman ladder hire", "professional youngman ladder hire", "quality youngman ladder hire", "youngman ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/youngman-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: scaffold hire prices (Score: 0.615)
    $anchor_options = ["scaffold hire prices", "professional scaffold hire prices", "quality scaffold hire prices", "scaffold hire prices services"];
    $target_url = home_url('https://hirein.co.uk/scaffold-hire-prices/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: step ladder hire (Score: 0.615)
    $anchor_options = ["step ladder hire", "professional step ladder hire", "quality step ladder hire", "step ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/step-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: lifting gear hire (Score: 0.615)
    $anchor_options = ["lifting gear hire", "professional lifting gear hire", "quality lifting gear hire", "lifting gear hire services"];
    $target_url = home_url('https://hirein.co.uk/lifting-gear-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: ladder accessory hire (Score: 0.615)
    $anchor_options = ["ladder accessory hire", "professional ladder accessory hire", "quality ladder accessory hire", "ladder accessory hire services"];
    $target_url = home_url('https://hirein.co.uk/ladder-accessory-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_equipment_maintenance', 15);


// Content modification for: Winter Construction: Heater Hire Guide
// Post slug: heater-hire-winter
// Links to insert: 8

function modify_content_heater_hire_winter($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'heater-hire-winter') {
        return $content;
    }
    
    // Priority 1: lifting equipment hire (Score: 0.615)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: industrial heater hire (Score: 0.615)
    $anchor_options = ["industrial heater hire", "professional industrial heater hire", "quality industrial heater hire", "industrial heater hire services"];
    $target_url = home_url('https://hirein.co.uk/industrial-heater-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: equipment hire (Score: 0.545)
    $anchor_options = ["equipment hire", "construction equipment rental", "professional equipment hire", "hire construction equipment", "equipment rental services"];
    $target_url = home_url('https://hirein.co.uk/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: heater hire (Score: 0.545)
    $anchor_options = ["heater hire", "industrial heater rental", "construction heaters", "site heating solutions", "portable heater hire"];
    $target_url = home_url('https://hirein.co.uk/heater-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: industrial gas heater hire (Score: 0.533)
    $anchor_options = ["industrial gas heater hire", "professional industrial gas heater hire", "quality industrial gas heater hire", "industrial gas heater hire services"];
    $target_url = home_url('https://hirein.co.uk/industrial-gas-heater-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: cheap ladder hire (Score: 0.462)
    $anchor_options = ["cheap ladder hire", "professional cheap ladder hire", "quality cheap ladder hire", "cheap ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/cheap-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: blow heater hire (Score: 0.462)
    $anchor_options = ["blow heater hire", "professional blow heater hire", "quality blow heater hire", "blow heater hire services"];
    $target_url = home_url('https://hirein.co.uk/blow-heater-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: platform ladder hire (Score: 0.462)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_heater_hire_winter', 15);


// Content modification for: Construction Site Safety Guide
// Post slug: construction-site-safety
// Links to insert: 8

function modify_content_construction_site_safety($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'construction-site-safety') {
        return $content;
    }
    
    // Priority 1: cheap ladder hire (Score: 0.571)
    $anchor_options = ["cheap ladder hire", "professional cheap ladder hire", "quality cheap ladder hire", "cheap ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/cheap-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: lifting equipment hire (Score: 0.571)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: platform ladder hire (Score: 0.571)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: youngman ladder hire (Score: 0.571)
    $anchor_options = ["youngman ladder hire", "professional youngman ladder hire", "quality youngman ladder hire", "youngman ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/youngman-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: scaffold hire prices (Score: 0.571)
    $anchor_options = ["scaffold hire prices", "professional scaffold hire prices", "quality scaffold hire prices", "scaffold hire prices services"];
    $target_url = home_url('https://hirein.co.uk/scaffold-hire-prices/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: step ladder hire (Score: 0.571)
    $anchor_options = ["step ladder hire", "professional step ladder hire", "quality step ladder hire", "step ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/step-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: ladder accessory hire (Score: 0.571)
    $anchor_options = ["ladder accessory hire", "professional ladder accessory hire", "quality ladder accessory hire", "ladder accessory hire services"];
    $target_url = home_url('https://hirein.co.uk/ladder-accessory-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: extension ladder hire (Score: 0.571)
    $anchor_options = ["extension ladder hire", "professional extension ladder hire", "quality extension ladder hire", "extension ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/extension-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_construction_site_safety', 15);


// Content modification for: How to Assemble a Scaffold Tower
// Post slug: scaffold-tower-assembly
// Links to insert: 8

function modify_content_scaffold_tower_assembly($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'scaffold-tower-assembly') {
        return $content;
    }
    
    // Priority 1: scaffold tower scaff tag hire (Score: 0.553)
    $anchor_options = ["scaffold tower scaff tag hire", "professional scaffold tower scaff tag hire", "quality scaffold tower scaff tag hire", "scaffold tower scaff tag hire services"];
    $target_url = home_url('https://hirein.co.uk/scaffold-tower-scaff-tag-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: aluminium scaffold tower hire (Score: 0.533)
    $anchor_options = ["aluminium scaffold tower hire", "professional aluminium scaffold tower hire", "quality aluminium scaffold tower hire", "aluminium scaffold tower hire services"];
    $target_url = home_url('https://hirein.co.uk/aluminium-scaffold-tower-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: tower scaffold protectors hire (Score: 0.533)
    $anchor_options = ["tower scaffold protectors hire", "professional tower scaffold protectors hire", "quality tower scaffold protectors hire", "tower scaffold protectors hire services"];
    $target_url = home_url('https://hirein.co.uk/tower-scaffold-protectors-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: mobile scaffold tower hire (Score: 0.533)
    $anchor_options = ["mobile scaffold tower hire", "professional mobile scaffold tower hire", "quality mobile scaffold tower hire", "mobile scaffold tower hire services"];
    $target_url = home_url('https://hirein.co.uk/mobile-scaffold-tower-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: lift shaft scaffold tower hire (Score: 0.471)
    $anchor_options = ["lift shaft scaffold tower hire", "professional lift shaft scaffold tower hire", "quality lift shaft scaffold tower hire", "lift shaft scaffold tower hire services"];
    $target_url = home_url('https://hirein.co.uk/lift-shaft-scaffold-tower-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: diy scaffold tower (Score: 0.462)
    $anchor_options = ["diy scaffold tower", "professional diy scaffold tower", "quality diy scaffold tower", "diy scaffold tower services"];
    $target_url = home_url('https://hirein.co.uk/diy-scaffold-tower/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: platform ladder hire (Score: 0.462)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: scaffold hire prices (Score: 0.462)
    $anchor_options = ["scaffold hire prices", "professional scaffold hire prices", "quality scaffold hire prices", "scaffold hire prices services"];
    $target_url = home_url('https://hirein.co.uk/scaffold-hire-prices/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_scaffold_tower_assembly', 15);


// Content modification for: Types of Construction Site Fencing
// Post slug: fencing-types-guide
// Links to insert: 8

function modify_content_fencing_types_guide($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'fencing-types-guide') {
        return $content;
    }
    
    // Priority 1: site fencing hire (Score: 0.462)
    $anchor_options = ["site fencing hire", "professional site fencing hire", "quality site fencing hire", "site fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/site-fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: security fencing hire (Score: 0.462)
    $anchor_options = ["security fencing hire", "professional security fencing hire", "quality security fencing hire", "security fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/security-fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: barrier fencing hire (Score: 0.415)
    $anchor_options = ["barrier fencing hire", "professional barrier fencing hire", "quality barrier fencing hire", "barrier fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/barrier-fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: fencing hire (Score: 0.364)
    $anchor_options = ["fencing hire", "professional fencing hire", "quality fencing hire", "fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: cheap ladder hire (Score: 0.308)
    $anchor_options = ["cheap ladder hire", "professional cheap ladder hire", "quality cheap ladder hire", "cheap ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/cheap-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: lifting equipment hire (Score: 0.308)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: platform ladder hire (Score: 0.308)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: youngman ladder hire (Score: 0.308)
    $anchor_options = ["youngman ladder hire", "professional youngman ladder hire", "quality youngman ladder hire", "youngman ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/youngman-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_fencing_types_guide', 15);


// Content modification for: Essential Site Security Equipment
// Post slug: site-security-equipment
// Links to insert: 8

function modify_content_site_security_equipment($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'site-security-equipment') {
        return $content;
    }
    
    // Priority 1: site fencing hire (Score: 0.417)
    $anchor_options = ["site fencing hire", "professional site fencing hire", "quality site fencing hire", "site fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/site-fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: security fencing hire (Score: 0.417)
    $anchor_options = ["security fencing hire", "professional security fencing hire", "quality security fencing hire", "security fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/security-fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: barrier fencing hire (Score: 0.367)
    $anchor_options = ["barrier fencing hire", "professional barrier fencing hire", "quality barrier fencing hire", "barrier fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/barrier-fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: lifting equipment hire (Score: 0.333)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: equipment hire (Score: 0.3)
    $anchor_options = ["equipment hire", "construction equipment rental", "professional equipment hire", "hire construction equipment", "equipment rental services"];
    $target_url = home_url('https://hirein.co.uk/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: fencing hire (Score: 0.3)
    $anchor_options = ["fencing hire", "professional fencing hire", "quality fencing hire", "fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: metal fencing hire (Score: 0.25)
    $anchor_options = ["metal fencing hire", "professional metal fencing hire", "quality metal fencing hire", "metal fencing hire services"];
    $target_url = home_url('https://hirein.co.uk/metal-fencing-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: site lighting hire (Score: 0.25)
    $anchor_options = ["site lighting hire", "professional site lighting hire", "quality site lighting hire", "site lighting hire services"];
    $target_url = home_url('https://hirein.co.uk/site-lighting-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_site_security_equipment', 15);


// Content modification for: Ladder Safety Tips for DIY Projects
// Post slug: ladder-safety-tips
// Links to insert: 8

function modify_content_ladder_safety_tips($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'ladder-safety-tips') {
        return $content;
    }
    
    // Priority 1: ladder accessory hire (Score: 0.415)
    $anchor_options = ["ladder accessory hire", "professional ladder accessory hire", "quality ladder accessory hire", "ladder accessory hire services"];
    $target_url = home_url('https://hirein.co.uk/ladder-accessory-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: cheap ladder hire (Score: 0.308)
    $anchor_options = ["cheap ladder hire", "professional cheap ladder hire", "quality cheap ladder hire", "cheap ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/cheap-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: platform ladder hire (Score: 0.308)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: youngman ladder hire (Score: 0.308)
    $anchor_options = ["youngman ladder hire", "professional youngman ladder hire", "quality youngman ladder hire", "youngman ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/youngman-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: step ladder hire (Score: 0.308)
    $anchor_options = ["step ladder hire", "professional step ladder hire", "quality step ladder hire", "step ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/step-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: extension ladder hire (Score: 0.308)
    $anchor_options = ["extension ladder hire", "professional extension ladder hire", "quality extension ladder hire", "extension ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/extension-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: aluminium ladder hire (Score: 0.308)
    $anchor_options = ["aluminium ladder hire", "professional aluminium ladder hire", "quality aluminium ladder hire", "aluminium ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/aluminium-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: 3 way ladder hire (Score: 0.267)
    $anchor_options = ["3 way ladder hire", "professional 3 way ladder hire", "quality 3 way ladder hire", "3 way ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/3-way-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_ladder_safety_tips', 15);


// Content modification for: Benefits of Powered Access Equipment
// Post slug: powered-access-benefits
// Links to insert: 8

function modify_content_powered_access_benefits($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'powered-access-benefits') {
        return $content;
    }
    
    // Priority 1: lifting equipment hire (Score: 0.386)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: boom lift hire (Score: 0.357)
    $anchor_options = ["boom lift hire", "professional boom lift hire", "quality boom lift hire", "boom lift hire services"];
    $target_url = home_url('https://hirein.co.uk/boom-lift-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: cherry picker hire (Score: 0.357)
    $anchor_options = ["cherry picker hire", "professional cherry picker hire", "quality cherry picker hire", "cherry picker hire services"];
    $target_url = home_url('https://hirein.co.uk/cherry-picker-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: powered access hire (Score: 0.357)
    $anchor_options = ["powered access hire", "professional powered access hire", "quality powered access hire", "powered access hire services"];
    $target_url = home_url('https://hirein.co.uk/powered-access-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: equipment hire (Score: 0.25)
    $anchor_options = ["equipment hire", "construction equipment rental", "professional equipment hire", "hire construction equipment", "equipment rental services"];
    $target_url = home_url('https://hirein.co.uk/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: high level powered access (Score: 0.25)
    $anchor_options = ["high level powered access", "professional high level powered access", "quality high level powered access", "high level powered access services"];
    $target_url = home_url('https://hirein.co.uk/high-level-powered-access/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: lift hire (Score: 0.25)
    $anchor_options = ["lift hire", "professional lift hire", "quality lift hire", "lift hire services"];
    $target_url = home_url('https://hirein.co.uk/lift-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: lifting gear hire (Score: 0.243)
    $anchor_options = ["lifting gear hire", "professional lifting gear hire", "quality lifting gear hire", "lifting gear hire services"];
    $target_url = home_url('https://hirein.co.uk/lifting-gear-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_powered_access_benefits', 15);


// Content modification for: DIY Home Renovation Project Planning
// Post slug: diy-home-renovation
// Links to insert: 8

function modify_content_diy_home_renovation($content) {
    // Only process this specific post
    if (get_post_field('post_name') !== 'diy-home-renovation') {
        return $content;
    }
    
    // Priority 1: diy scaffold tower (Score: 0.357)
    $anchor_options = ["diy scaffold tower", "professional diy scaffold tower", "quality diy scaffold tower", "diy scaffold tower services"];
    $target_url = home_url('https://hirein.co.uk/diy-scaffold-tower/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 2: scaffold tower scaff tag hire (Score: 0.3)
    $anchor_options = ["scaffold tower scaff tag hire", "professional scaffold tower scaff tag hire", "quality scaffold tower scaff tag hire", "scaffold tower scaff tag hire services"];
    $target_url = home_url('https://hirein.co.uk/scaffold-tower-scaff-tag-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 3: cheap ladder hire (Score: 0.286)
    $anchor_options = ["cheap ladder hire", "professional cheap ladder hire", "quality cheap ladder hire", "cheap ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/cheap-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 4: lifting equipment hire (Score: 0.286)
    $anchor_options = ["lifting equipment hire", "professional lifting equipment", "lifting gear rental", "hire lifting equipment", "lifting equipment services"];
    $target_url = home_url('https://hirein.co.uk/lifting-equipment-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 5: platform ladder hire (Score: 0.286)
    $anchor_options = ["platform ladder hire", "professional platform ladder hire", "quality platform ladder hire", "platform ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/platform-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 6: youngman ladder hire (Score: 0.286)
    $anchor_options = ["youngman ladder hire", "professional youngman ladder hire", "quality youngman ladder hire", "youngman ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/youngman-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 7: scaffold hire prices (Score: 0.286)
    $anchor_options = ["scaffold hire prices", "professional scaffold hire prices", "quality scaffold hire prices", "scaffold hire prices services"];
    $target_url = home_url('https://hirein.co.uk/scaffold-hire-prices/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    // Priority 8: step ladder hire (Score: 0.286)
    $anchor_options = ["step ladder hire", "professional step ladder hire", "quality step ladder hire", "step ladder hire services"];
    $target_url = home_url('https://hirein.co.uk/step-ladder-hire/');
    
    foreach ($anchor_options as $anchor_text) {
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {
            break; // Move to next link
        }
    }
    
    return $content;
}
add_filter('the_content', 'modify_content_diy_home_renovation', 15);

