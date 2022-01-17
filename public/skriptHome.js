var width=200;
var difference=2;
var interveralID =0;
var picId = "";


function increase(id)
{
    clearInterval(interveralID);
      picId = id;
        interveralID = setInterval(expand, 10);

}
function decrease(id)
{
    clearInterval(interveralID);
    picId = id;
        interveralID = setInterval(shrink, 10);
}

function expand()
{

    if(width<400)
    {
        width = width+difference;
        if (picId === 'img1') {
            document.getElementById('img1').width = width;
        } else if (picId === 'img2') {
            document.getElementById('img2').width = width;
        }  else if (picId === 'img3') {
            document.getElementById('img3').width = width;
        } else if (picId === 'img4') {
            document.getElementById('img4').width = width;
        } else if (picId === 'img5') {
            document.getElementById('img5').width = width;
        } else if (picId === 'img6') {
            document.getElementById('img6').width = width;
        } else if (picId === 'img7') {
            document.getElementById('img7').width = width;
        } else if (picId === 'img8') {
            document.getElementById('img8').width = width;
        }
    }
    else
    {
        clearInterval(interveralID);
    }
}

function shrink()
{
    if(width>200)
    {
        width = width-difference;
        document.getElementById(picId).width=width;
    }
    else
    {
        clearInterval(interveralID);
    }
}

