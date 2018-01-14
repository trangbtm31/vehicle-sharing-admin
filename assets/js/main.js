/**
 * Created by trang on 1/14/18.
 */

/**
 * Set user Id and Journey Id into lock user modal in Jounney list
 * @param $userId
 * @param $journeyId
 */
function setUserId($userId, $journeyId) {
    $('#lockuserid').val($userId);
    $('#journeyid').val($journeyId);
}

/**
 * Set user Id into lock user modal in User List
 * @param $userId
 */
function setUserIdToLockModal($userId) {
    $('#lockuserid').val($userId);
}

/**
 * Set user Id to unlock user modal in User List
 * @param $userId
 */
function setUserIdToUnlockModal($userId) {
    $('#unlockuserid').val($userId);
}

/**
 * Set request Id to cancel request modal 
 * @param $requestId
 */
function setRequestId($requestId) {
    $('#requestid').val($requestId);
}

/**
 *  Ajax lock user
 */
function lockUser() {
    var userId = $('#lockuserid').val();
    if($('#journeyid').val() != 'undefined') {
        var journeyId = $('#journeyid').val();
    } else {
        var journeyId = null;
    }
    $.ajax({
        type: "POST",
        url: "assets/lockUser.php",
        data: {
            'user_id': userId,
            'journey_id' : journeyId
        },
        success: function (response) {
            var result = JSON.parse(response);
            if (result.is_success === 1) {
                $('#success').modal();
                if(result.journey_id) {
                    $('#'+result.journey_id).hide();
                } else {
                    $('#lo-'+result.user_id).hide();
                }
            } else {
                console.log(result.message);
            }
        }
    });
}

/**
 * Ajax unlock user
 */
function unlockUser() {
    var userId = $('#unlockuserid').val();
    $.ajax({
        type: "POST",
        url: "assets/unlockUser.php",
        data: {
            'user_id': userId,
        },
        success: function (response) {
            var result = JSON.parse(response);
            if (result.is_success === 1) {
                $('#success').modal();
                $('#unlo-'+result.user_id).hide();
            } else {
                console.log(result.message);
            }
        }
    });
}
/**
 * Ajax cancel request
 */
function cancelRequest() {
    var requestId = $('#requestid').val();
    $.ajax({
        type: "POST",
        url: "assets/cancelRequest.php",
        data: {
            'request_id': requestId,
        },
        success: function (response) {
            var result = JSON.parse(response);
            if (result.is_success === 1) {
                $('#success').modal();
                $('#'+result.request_id).hide();
            } else {
                console.log(result.message);
            }
        }
    });
}