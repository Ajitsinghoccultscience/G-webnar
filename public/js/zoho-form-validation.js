/**
 * Zoho Forms validation - required for Mega Webnar form submission.
 * Do not modify field names or function names.
 */
function zf_ValidateAndSubmit(){
    if(zf_CheckMandatory()){
        if(zf_ValidCheck()){
            if(typeof isSalesIQIntegrationEnabled !== 'undefined' && isSalesIQIntegrationEnabled){
                if(typeof zf_addDataToSalesIQ === 'function') zf_addDataToSalesIQ();
            }
            return true;
        }
        return false;
    }
    return false;
}
function zf_CheckMandatory(){
    for(var i = 0; i < zf_MandArray.length; i++){
        var fieldObj = document.forms.form[zf_MandArray[i]];
        if(fieldObj){
            if(fieldObj.nodeName != null){
                if(fieldObj.nodeName === 'OBJECT'){
                    if(typeof zf_MandatoryCheckSignature === 'function' && !zf_MandatoryCheckSignature(fieldObj)){
                        zf_ShowErrorMsg(zf_MandArray[i]);
                        return false;
                    }
                } else if(((fieldObj.value).replace(/^\s+|\s+$/g, '')).length === 0){
                    if(fieldObj.type === 'file'){
                        fieldObj.focus();
                        zf_ShowErrorMsg(zf_MandArray[i]);
                        return false;
                    }
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_MandArray[i]);
                    return false;
                } else if(fieldObj.nodeName === 'SELECT'){
                    if(fieldObj.options[fieldObj.selectedIndex].value === '-Select-'){
                        fieldObj.focus();
                        zf_ShowErrorMsg(zf_MandArray[i]);
                        return false;
                    }
                } else if(fieldObj.type === 'checkbox' || fieldObj.type === 'radio'){
                    if(fieldObj.checked === false){
                        fieldObj.focus();
                        zf_ShowErrorMsg(zf_MandArray[i]);
                        return false;
                    }
                }
            } else {
                var checkedValsCount = 0;
                var inpChoiceElems = fieldObj;
                for(var ii = 0; ii < inpChoiceElems.length; ii++){
                    if(inpChoiceElems[ii].checked === true) checkedValsCount++;
                }
                if(checkedValsCount === 0){
                    inpChoiceElems[0].focus();
                    zf_ShowErrorMsg(zf_MandArray[i]);
                    return false;
                }
            }
        }
    }
    return true;
}
function zf_ValidCheck(){
    var isValid = true;
    for(var ind = 0; ind < zf_FieldArray.length; ind++){
        var fieldObj = document.forms.form[zf_FieldArray[ind]];
        if(fieldObj && fieldObj.nodeName != null){
            var checkType = fieldObj.getAttribute("checktype");
            if(checkType === "c2"){
                if(!zf_ValidateNumber(fieldObj)){
                    isValid = false;
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_FieldArray[ind]);
                    return false;
                }
            } else if(checkType === "c3"){
                if(!zf_ValidateCurrency(fieldObj) || !zf_ValidateDecimalLength(fieldObj,10)){
                    isValid = false;
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_FieldArray[ind]);
                    return false;
                }
            } else if(checkType === "c4"){
                if(!zf_ValidateDateFormat(fieldObj)){
                    isValid = false;
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_FieldArray[ind]);
                    return false;
                }
            } else if(checkType === "c5"){
                if(!zf_ValidateEmailID(fieldObj)){
                    isValid = false;
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_FieldArray[ind]);
                    return false;
                }
            } else if(checkType === "c6"){
                if(!zf_ValidateLiveUrl(fieldObj)){
                    isValid = false;
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_FieldArray[ind]);
                    return false;
                }
            } else if(checkType === "c7"){
                if(!zf_ValidatePhone(fieldObj)){
                    isValid = false;
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_FieldArray[ind]);
                    return false;
                }
            } else if(checkType === "c8"){
                if(typeof zf_ValidateSignature === 'function') zf_ValidateSignature(fieldObj);
            } else if(checkType === "c9"){
                if(!zf_ValidateMonthYearFormat(fieldObj)){
                    isValid = false;
                    fieldObj.focus();
                    zf_ShowErrorMsg(zf_FieldArray[ind]);
                    return false;
                }
            }
        }
    }
    return isValid;
}
function zf_ShowErrorMsg(uniqName){
    for(var errInd = 0; errInd < zf_FieldArray.length; errInd++){
        var fldLinkName = zf_FieldArray[errInd].split('_')[0];
        var errEl = document.getElementById(fldLinkName + "_error");
        if(errEl) errEl.style.display = 'none';
    }
    var linkName = uniqName.split('_')[0];
    var showEl = document.getElementById(linkName + "_error");
    if(showEl) showEl.style.display = 'block';
}
function zf_ValidateNumber(elem){
    var validChars = "-0123456789";
    var numValue = elem.value.replace(/^\s+|\s+$/g, '');
    if(numValue != null && numValue !== ""){
        for(var i = 0; i < numValue.length; i++){
            var strChar = numValue.charAt(i);
            if(numValue.charAt(0) === "-" && numValue.length === 1) return false;
            if((strChar === "-") && (i != 0)) return false;
            if(validChars.indexOf(strChar) === -1) return false;
        }
        return true;
    }
    return true;
}
function zf_ValidateDateFormat(inpElem){
    var dateValue = inpElem.value.replace(/^\s+|\s+$/g, '');
    return dateValue === "" ? true : (typeof zf_DateRegex !== 'undefined' && zf_DateRegex.test(dateValue));
}
function zf_ValidateCurrency(elem){
    var validChars = "0123456789.";
    var numValue = elem.value.replace(/^\s+|\s+$/g, '');
    if(numValue.charAt(0) === '-') numValue = numValue.substring(1, numValue.length);
    if(numValue != null && numValue !== ""){
        for(var i = 0; i < numValue.length; i++){
            if(validChars.indexOf(numValue.charAt(i)) === -1) return false;
        }
        return true;
    }
    return true;
}
function zf_ValidateDecimalLength(elem, decimalLen){
    var numValue = elem.value;
    if(numValue.indexOf('.') >= 0){
        var decimalLength = numValue.substring(numValue.indexOf('.') + 1).length;
        return decimalLength <= decimalLen;
    }
    return true;
}
function zf_ValidateEmailID(elem){
    var emailValue = elem.value;
    if(emailValue != null && emailValue !== ""){
        var emailArray = emailValue.split(",");
        var emailExp = /^[\w]([\w\-.+&'/]*)@([a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,22}$/;
        for(var i = 0; i < emailArray.length; i++){
            if(!emailExp.test(emailArray[i].replace(/^\s+|\s+$/g, ''))) return false;
        }
    }
    return true;
}
function zf_ValidateLiveUrl(elem){
    var urlValue = elem.value;
    if(urlValue != null && typeof urlValue !== "undefined"){
        urlValue = urlValue.replace(/^\s+|\s+$/g, '');
        if(urlValue !== ""){
            var urlregex = new RegExp("^(((https|http|ftps|ftp)://[a-zA-Z\\d]+((_|-|@)[a-zA-Z\\d]+)*(\\.[a-zA-Z\\d]+((_|-|@)[a-zA-Z\\d]+)*)+(:\\d{1,5})?)|((w|W){3}(\\.[a-zA-Z\\d]+((_|-|@)[a-zA-Z\\d]+)*){2,}(:\\d{1,5})?)|([a-zA-Z\\d]+((_|-)[a-zA-Z\\d]+)*(\\.[a-zA-Z\\d]+((_|-)[a-zA-Z\\d]+)*)+(:\\d{1,5})?))(/[-\\w.?,:'/\\\\+=&;%$#@()!~]*)?$", "i");
            return urlregex.test(urlValue);
        }
    }
    return true;
}
function zf_ValidatePhone(inpElem){
    var ZFPhoneRegex = {
        PHONE_INTE_ALL_REG: /^[+]{0,1}[()0-9-. ]+$/,
        PHONE_INTE_NUMERIC_REG: /^[0-9]+$/,
        PHONE_CONT_CODE_REG: /^[+][0-9]{1,4}$/
    };
    var phoneFormat = parseInt(inpElem.getAttribute("phoneFormat"));
    var fieldInpVal = inpElem.value.replace(/^\s+|\s+$/g, '');
    if(phoneFormat === 1){
        if(inpElem.getAttribute("valType") === 'code'){
            if(fieldInpVal != "" && !ZFPhoneRegex.PHONE_CONT_CODE_REG.test(fieldInpVal)) return false;
        } else {
            var IRexp = inpElem.getAttribute("phoneFormatType") === '2' ? ZFPhoneRegex.PHONE_INTE_NUMERIC_REG : ZFPhoneRegex.PHONE_INTE_ALL_REG;
            if(fieldInpVal != "" && !IRexp.test(fieldInpVal)) return false;
        }
        return true;
    } else if(phoneFormat === 2){
        var InpMaxlength = inpElem.getAttribute("maxlength");
        if(fieldInpVal != "" && ZFPhoneRegex.PHONE_INTE_NUMERIC_REG.test(fieldInpVal) && fieldInpVal.length == InpMaxlength) return true;
        if(fieldInpVal === "") return true;
        return false;
    }
    return true;
}
function zf_ValidateMonthYearFormat(inpElem){
    var monthYearValue = inpElem.value.replace(/^\s+|\s+$/g, '');
    return monthYearValue === "" ? true : (typeof zf_MonthYearRegex !== 'undefined' && zf_MonthYearRegex.test(monthYearValue));
}
function zf_SetDateAndMonthRegexBasedOnDateFormate(dateFormat){
    var dateAndMonthRegexFormateArray = [];
    var dateFormatRegExp, monthYearFormatRegExp;
    if(dateFormat === "dd-MMM-yyyy"){
        dateFormatRegExp = "^(([0][1-9])|([1-2][0-9])|([3][0-1]))[-](Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)[-](?:(?:19|20)[0-9]{2})$";
        monthYearFormatRegExp = "^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)[-](?:(?:19|20)[0-9]{2})$";
    } else if(dateFormat === "dd/MM/yyyy"){
        dateFormatRegExp = "^(([0][1-9])|([1-2][0-9])|([3][0-1]))[\\/]([0][1-9]|1[012])[\\/](?:(?:19|20)[0-9]{2})$";
        monthYearFormatRegExp = "^([0][1-9]|1[012])[\\/](?:(?:19|20)[0-9]{2})$";
    } else {
        dateFormatRegExp = "^(([0][1-9])|([1-2][0-9])|([3][0-1]))[-](Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)[-](?:(?:19|20)[0-9]{2})$";
        monthYearFormatRegExp = "^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)[-](?:(?:19|20)[0-9]{2})$";
    }
    dateAndMonthRegexFormateArray.push(dateFormatRegExp);
    dateAndMonthRegexFormateArray.push(monthYearFormatRegExp);
    return dateAndMonthRegexFormateArray;
}
