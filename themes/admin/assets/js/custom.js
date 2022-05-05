/* 
 * This is a custom js file for easy to work
 * Author Rajib Kumar Rakhmit
 */
function convertToSlug(Text)
{
    return Text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
}

