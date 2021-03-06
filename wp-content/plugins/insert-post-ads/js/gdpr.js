/* Begin IAB API V 1.1 Implementation */
var __vicmp = (function () {
    return typeof (__vicmp) == "function" ? __vicmp : function (c) {
        var b = arguments;
        if (!b.length) {
            return __vicmp.a;
        }
        else if (c == '__vicmp') {
            return false;
        } else {
            if (typeof __vicmp.a === 'undefined') {
                __vicmp.a = [];
            }
            __vicmp.a.push([].slice.apply(b)); 
            if(typeof __vicmp.execute != 'undefined') {
                __vicmp.execute(b);
            }
        }
    }
})();

function insert_ads_vi_consent_onload_cmp() {   
    if(typeof __vicmp.execute === 'undefined') {
        __vicmp.execute = function(b) {
            var data = {};
            if(typeof b != 'undefined') {
                if(b[0] == 'getUserConsentStatus') {
					var ViconsentCookie = insert_ads_vi_consent_popup_get_cookie('Viconsent');
					var gdprStatus = false;
					if(document.getElementById('insert_ads_vi_consent_popup_is_eu').value == '1') {
						gdprStatus = true;
					}
					if(ViconsentCookie != '') {
					var ViconsentCookieData = insert_ads_vi_consent_popup_decode_cookie_content(ViconsentCookie);
						data = {
							gdprApplies: gdprStatus,
							hasGlobalScope: false,
							consent: ViconsentCookieData['PurposeAllowed'][1],
						}
					} else { // Cookie Missing / Corrupted
						data = {
							gdprApplies: gdprStatus,
							hasGlobalScope: false,
							consent: false,
						}
					}
                }
                b[2](data, true);
            }
        };
        
        if(__vicmp.a && typeof func === 'undefined') {
            for(var i=0; i<__vicmp.a.length;i++) {
                __vicmp.execute(__vicmp.a[i]);
            }
        }
    }
}

setTimeout(insert_ads_vi_consent_onload_cmp, 500);
/* End IAB API V 1.1 Implementation */

/* Begin Consent Cookie Implementation */
function insert_ads_vi_consent_popup_disagree() {
	var cookieData = insert_ads_vi_consent_popup_create_cookie_content('000000000000000000000000');
	insert_ads_vi_consent_popup_set_cookie('Viconsent', cookieData);
	
	var ajaxFrame = document.createElement('iframe');
	ajaxFrame.src = document.getElementById('insert_ads_vi_consent_popup_url').value + '?insert_ads_vi_consent=' + document.getElementById('insert_ads_vi_consent_popup_auth').value;
	ajaxFrame.style.display = 'none';
	document.getElementById('insert_ads_vi_consent_popup_wrapper').appendChild(ajaxFrame);  
	document.getElementById('insert_ads_vi_consent_popup_wrapper').style.display = 'none';
	document.getElementById('insert_ads_vi_consent_popup_overlay').style.display = 'none';
	document.getElementById('insert_ads_vi_consent_popup_settings_button').style.display = 'block';
}

function insert_ads_vi_consent_popup_agree() {
	var insert_ads_vi_consent_popup_vendor_list_purposes = document.getElementById('insert_ads_vi_consent_popup_vendor_list_purposes').value;
	var cookieData = insert_ads_vi_consent_popup_create_cookie_content(insert_ads_vi_consent_popup_vendor_list_purposes);
	insert_ads_vi_consent_popup_set_cookie('Viconsent', cookieData);

	var ajaxFrame = document.createElement('iframe');
	ajaxFrame.src = document.getElementById('insert_ads_vi_consent_popup_url').value + '?insert_ads_vi_consent=' + document.getElementById('insert_ads_vi_consent_popup_auth').value;
	ajaxFrame.style.display = 'none';
	document.getElementById('insert_ads_vi_consent_popup_wrapper').appendChild(ajaxFrame);  
	document.getElementById('insert_ads_vi_consent_popup_wrapper').style.display = 'none';
	document.getElementById('insert_ads_vi_consent_popup_overlay').style.display = 'none';
	document.getElementById('insert_ads_vi_consent_popup_settings_button').style.display = 'block';
}

function insert_ads_vi_consent_popup_create_cookie_content(purposeAllowed) {
	cookieConsentTimeStamp = Math.round((new Date()).getTime()/100);
	var cookieConsent = new Object();
	cookieConsent['Version'] = insert_ads_vi_consent_popup_create_binary_string(1, 6);
	cookieConsent['Created'] = insert_ads_vi_consent_popup_create_binary_string(cookieConsentTimeStamp, 36);
	cookieConsent['LastUpdated'] = insert_ads_vi_consent_popup_create_binary_string(cookieConsentTimeStamp, 36);
	cookieConsent['CMPId'] = insert_ads_vi_consent_popup_create_binary_string(999, 12);
	cookieConsent['CMPVersion'] = insert_ads_vi_consent_popup_create_binary_string(0, 6);
	cookieConsent['ConsentScreen'] = insert_ads_vi_consent_popup_create_binary_string(0, 6);
	cookieConsent['ConsentLanguage'] = insert_ads_vi_consent_popup_create_binary_string(4, 6)+insert_ads_vi_consent_popup_create_binary_string(13, 6);
	var insert_ads_vi_consent_popup_vendor_list_version = parseInt(document.getElementById('insert_ads_vi_consent_popup_vendor_list_version').value);
	cookieConsent['VendorListVersion'] = insert_ads_vi_consent_popup_create_binary_string(insert_ads_vi_consent_popup_vendor_list_version, 12);
	cookieConsent['PurposeAllowed'] = purposeAllowed;

	return window.btoa(cookieConsent['Version'] + cookieConsent['Created'] + cookieConsent['LastUpdated'] + cookieConsent['CMPId'] + cookieConsent['CMPVersion'] + cookieConsent['ConsentScreen'] + cookieConsent['ConsentLanguage'] + cookieConsent['VendorListVersion'] + cookieConsent['PurposeAllowed']);
}

function insert_ads_vi_consent_popup_decode_cookie_content(cookieData) {
	if(cookieData != '') {
		var binaryCookieData  = atob(cookieData);
		var cookieConsent = new Object();
		cookieConsent['Version'] = parseInt(binaryCookieData.substring(0, 6), 2);
		cookieConsent['Created'] = parseInt(binaryCookieData.substring(6, 42), 2);
		cookieConsent['LastUpdated'] = parseInt(binaryCookieData.substring(42, 78), 2);
		cookieConsent['CMPId'] = parseInt(binaryCookieData.substring(78, 90), 2);
		cookieConsent['CMPVersion'] = parseInt(binaryCookieData.substring(90, 96), 2);
		cookieConsent['ConsentScreen'] = parseInt(binaryCookieData.substring(96, 102), 2);
		cookieConsent['ConsentLanguage'] = parseInt(binaryCookieData.substring(102, 108), 2)+''+parseInt(binaryCookieData.substring(106, 114), 2);
		cookieConsent['VendorListVersion'] = parseInt(binaryCookieData.substring(114,126), 2);
		cookieConsent['PurposeAllowed'] = binaryCookieData.substring(126, 150);
		
		var purposeConsents = new Object();
		for(var i = 24; i > 0; i--) {
			if(cookieConsent['PurposeAllowed'].substring(i - 1, i) == '1') {
				purposeConsents[(24 - i) + 1] = true;
			} else {
				purposeConsents[(24 - i) + 1] = false;
			}
		}
		cookieConsent['PurposeAllowed'] = purposeConsents;
		return cookieConsent;
	}
	return false;
}

function insert_ads_vi_consent_popup_create_binary_string(dMask, dBitSize) {
	var bMask = "";
	if(dBitSize <= 32) {		
		while(dBitSize--) {
			bMask += (dMask >> dBitSize) & 1;
		}
	} else {
		bMask = dMask.toString(2);
		while (bMask.length < dBitSize) {
			bMask = "0" + bMask;
		}
	}
	return bMask;
}

function insert_ads_vi_consent_popup_set_cookie(name, value) {
	var date = new Date();
    date.setTime(date.getTime() + (365*24*60*60*1000));
	document.cookie = name + "=" + value + ";" + "expires=" + date.toUTCString() + ";path=/";
}

function insert_ads_vi_consent_popup_get_cookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function insert_ads_vi_consent_popup_settings() {
	document.getElementById('insert_ads_vi_consent_popup_wrapper').style.display = 'block';
	document.getElementById('insert_ads_vi_consent_popup_overlay').style.display = 'block';
	document.getElementById('insert_ads_vi_consent_popup_settings_button').style.display = 'none';
}

function insert_ads_vi_consent_popup_load() {
	if(document.getElementById('insert_ads_vi_consent_popup_is_eu').value == true) {
		if(insert_ads_vi_consent_popup_get_cookie('Viconsent') == false) {
			document.getElementById('insert_ads_vi_consent_popup_wrapper').style.display = 'block';
			document.getElementById('insert_ads_vi_consent_popup_overlay').style.display = 'block';
			document.getElementById('insert_ads_vi_consent_popup_settings_button').style.display = 'none';	
		} else {
			document.getElementById('insert_ads_vi_consent_popup_wrapper').style.display = 'none';
			document.getElementById('insert_ads_vi_consent_popup_overlay').style.display = 'none';
			document.getElementById('insert_ads_vi_consent_popup_settings_button').style.display = 'block';
		}
	} else {
		document.getElementById('insert_ads_vi_consent_popup_wrapper').style.display = 'none';
		document.getElementById('insert_ads_vi_consent_popup_overlay').style.display = 'none';
		document.getElementById('insert_ads_vi_consent_popup_settings_button').style.display = 'none';
	}
}
setTimeout(insert_ads_vi_consent_popup_load, 500);
/* End Consent Cookie Implementation */