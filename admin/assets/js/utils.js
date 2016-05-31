$.fn.addItems = function(data, id, text, initial,initialText, separator, atributos, title) {
  separator = separator === undefined ? ' ' : separator;
  initial = initial === undefined ? false : initial;
  atributos = atributos === undefined ? [""]:atributos;
  return this.each(function() {
    //var list = this;
    var list = this;
    $(list).find('option').remove();
    if (initial) {
      if(initialText){
        list.add(new Option(initialText, ''));
      } else {
        list.add(new Option('[SELECCIONE]', ''));
      }
    }
    $.each(data, function(index, itemData) {
      //var newText = null;
      var newText = null;
      if (text.constructor == Array) {
        $.each(text,function(idx,name){
          //var txt = $.getJSONRealValue(itemData,name);
          var txt = $.getJSONRealValue(itemData,name);
          newText = newText === null ? txt + '' : newText + separator + (txt === undefined ? '' : txt);
        });
      } else {
        //var txt = $.getJSONRealValue(itemData,text);
        var txt = $.getJSONRealValue(itemData,text);
        newText = txt === undefined ? '' : txt;
      }
      var opt = $('<option></option>');
      opt.val($.getJSONRealValue(itemData,id));
      opt.text(newText);
      
      for(var i =0 ; i < atributos.length ; i++){
        opt.attr(atributos[i].attr,atributos[i].valor);
      }      
      
      if (title) {
        opt.attr('title',$.getJSONRealValue(itemData,title));
      }
      $(list).append(opt);
    });
  });
};

$.fn.addLiToUl = function(data, valueName, styles, liStyles) { //liStyle = [{attributeName, attributeValue, trueClass, falseClass}]
  var $this = $(this);
  $this.find('li').remove();
  $.each(data, function(index, value) {
    var $elLi = $('<li></li>');
    $elLi.text(value[valueName]);

    //cargar estilos a los li
    $.each(liStyles, function(index, liStyle) {
      if(value[liStyle.attributeName] == value.attributeValue) {
        $elLi.addClass('list-group-item');
        $elLi.addClass(liStyle.trueClass);
      } else {
        $elLi.addClass('list-group-item');
        $elLi.addClass(liStyle.falseClass);
      }
    });

    $this.append($elLi);

    $.each(styles, function(index, style) {
      $this.addClass(style);
    });
  });
}

$.fn.loadSpanFromJSON = function(object){
  el=this;
  $(el).find('span').each(function(index, label) {
    var key=$(label).attr('id');
    if(object[key]!=null && object[key]!="null" && object[key]!=""){
      $(label).html(object[key]);
    }else{
    	$(label).html('&nbsp;');
    }
  });
}

var getValueFromJSONByNameAtribute = function(object, name) {
  var valor=null;
  if(name.indexOf('.')<0){
    valor=object[name];
  } else{
    var attributes =name.split('.');
    actual = object;
    attrLargo=attributes.length;
    $.each(attributes,function(index,attr){
      if(!actual){
        valor = null;
      } else if(index==(attrLargo-1)){
        valor = actual[attr];
      } else{
        actual=actual[attr];
      }
    });
  }
  
  return valor;
}

$.fn.loadSpanFromJSON = function(object){
  el=this;
  $(el).find('span').each(function(index, el) {
    name=$(el).attr('name');
    
    var valor = getValueFromJSONByNameAtribute(object, name);
    valor=valor!=null?valor:'';
    
    if($(el).hasClass('dateDDMMYYYY')){
      $(el).text(valor.toString('dd/MM/yyyy'));
    } else{
      $(el).text(valor);
    }
    
  });
}

$.fn.loadFormFromJSON = function(object){
  var form =this;
  $(form).reset(); 
  $(form).find('input,select,textarea').each(function(index, el) {
    
    var name=$(el).attr('name');
    var valor=getValueFromJSONByNameAtribute(object,name);
    
    if(el.type=='checkbox'){
      if(valor=='S' || valor=='s' || valor=='true' || valor=='TRUE' || valor==true){
        $(el).attr('checked', true);
      }else{
        $(el).removeAttr('checked');
      }
      $(el).trigger('change');
    } else if(el.tagName=='SELECT' && (valor===true || valor===false)){
      valor = valor?'true':'false';
      $(el).val(valor);
    } else if($(el).hasClass('dateDDMMYYYY')){
      $(el).val(valor!=null?valor.toString('dd/MM/yyyy'):'');
    } else{
      $(el).val(valor);
    }
  });
}

$.getJSONRealValue = function(o, name, model) {
  if (name == null) return "";
  if (o == null) return "";
  if (typeof(name)==='function') {
    return name(o);
  }
  if (name.indexOf('.') < 0) {
    if (o[name] instanceof Date && model.format != undefined && model.format != null && model.format != '') {
  return o[name].toString(model.format);    
    }
    return o[name] == null ? '' : o[name].toString().replace(/\n/g,'<br>');
  } else {
    var attributes = name.split('.');
    for (var i = 0; i < attributes.length; i++) 
  o = o == null ? null : o[attributes[i]];
    if (o instanceof Date && model.format != undefined && model.format != null && model.format != '') {
  return o.toString(model.format);  
    }
    return o == null ? '' : o.toString().replace(/\n/g,'<br>');
  }
};


$.fn.serializeObject = function() {
  var elForm = this;
  var o={};
  $.each($(elForm).find('input,select,textarea'),function(index,el){
    
    var name=$(el).attr('name');
    if(name.indexOf('.')<0){
      //si el nombre no está separado por puntos solo se asigna el valor
      if($(el).hasClass('dateDDMMYYYY')){
//        o[name]=Date.parseExact($(el).val(),'dd/MM/yyyy');
        o[name]=$(el).val();
      } else if($(el).attr('type')=='checkbox'){
        o[name] = $(el).is(':checked')?true:false;
      } else {
        o[name]=$(el).val();
      }
    } else{
      //se separan los atributos basandose en el nombre
      var attributes = name.split('.');
      var largo = attributes.length;
      var actual = o;
      $.each(attributes,function(index,attr){
        if(index==largo-1){
          if($(el).hasClass('dateDDMMYYYY')){
            actual[attr]=Date.parseExact($(el).val(),'dd/MM/yyyy');
          } else if($(el).attr('type')=='checkbox'){
            o[name] = $(el).is(':checked')?true:false;
          } else{
            actual[attr]=$(el).val();
          }
         //si está vacío se asigna como null :O
         actual[attr]=actual[attr]==''?null:actual[attr];
        }else{
          if(actual[attr]==undefined){
            actual[attr]=new Object();
          }
          actual = actual[attr];
        }
      });
    }
  });
  return o;
};

$.fn.serializeJSONString = function() {
  $this = $(this);
  var object = $this.serializeObject();
  return JSON.stringify(object);
}

var splitTags = function(stringTags){
  var tag='';
  for(i=0;i<=stringTags.length;i++){
    if(stringTags.charAt(i)!=',' && stringTags.charAt(i)!=' ' && i<(stringTags.length)){
  tag+=stringTags.charAt(i)
    } else if(tag!=''){
  alert(tag);
  tag='';
    }
  }
  
  return stringTags;
}

var getUsuarioFromSession = function(){
  usuario=null;
  $.ajax({
    url: urlHome+'protected/functions/get_usuario_from_session.php',
    type: 'POST',
    dataType: 'json',
    async:false,
    success:function(datos){
  usuario= datos;
    }
  })
  return usuario;
}

var validEqualsInputs=function(inputs,msg){
  
  valido=true;
  $.each(inputs, function(index, input) {
    if(valido){
  $.each(inputs, function(index, input2) {
     if($(input).val()!=$(input2).val()){
      valido=false;
     }
  });
    }
    $(input).change(function(){
  validEqualsInputs(inputs,msg);
    });
  });
  if(valido){
    $.each(inputs,function(index, input){
  $(input).removeClass('error2');
  $(input).removeAttr('title',msg);
    });
    return true;
  } else{
    $.each(inputs,function(index, input){
  $(input).addClass('error2');
  $(input).attr('title',msg);
    });
    return false;
  }
}

$.fn.reset = function () {
  $(this).find('input[type=hidden]').val('');
  $(this).find('select :selected').removeAttr('selected');
  $(this).find('textarea').text('');
  $(this).find('select').find('option[value=""]').attr('selected','selected');  
  $(this).find('input[type=checkbox]').attr('checked',false).trigger('change');
  $(this).find('input, select, textarea').removeAttr('title').removeClass('error');
  $(this).each(function() { 
    this.reset(); 
  });
  return $(this);
};

var isInArray = function(valor,array){
  return array.indexOf(valor) > -1;
}

$.fn.readOnly = function () {
  $(this).find('input, textarea').prop('readonly',true);
  $(this).find('select').prop('disabled',true);
};

$.fn.hasAttr = function(attributeName){
  var attr = $(this).attr(attributeName);
  if (typeof attr !== typeof undefined && attr !== false) {
    return true;
  } else {
    return false;
  }
}

/*
* Convertir Byte a kilo, mega o giga
* @Param
* bytes
* unidad (opcional, kb,mb,gb)
*/
var byteTo = function(bytes,unidad){
  var valor;
  unidad=unidad!=undefined?unidad:'none';
  if(bytes<1000){
    valor=bytes;
    unidad = 'Bytes'
  }else if(unidad.toUpperCase() =='KB'  || (bytes>999 && bytes<1000000)){
    valor= bytes/1000;
    unidad='KB';
  } else if(unidad.toUpperCase() =='MB'  || (bytes>999999 && bytes<1000000000)){
    valor= bytes/1000000;
    unidad='MB';
  } else if(unidad.toUpperCase() =='GB'  || (bytes>999999999 && bytes<1000000000000)){
    valor= bytes/1000000000;
    unidad='GB';
  }

  //verificar si es entero
  if (valor % 1 != 0) {
    valor= valor.toFixed(1);
  }

  return valor+' '+unidad.toUpperCase()
}

var uniqCount=1000;
function uniqid(){
  return uniqCount++;
};

$('#div_carga').hide()

$(document).ajaxSend(function(event, xhr, options) {

  if(options.loaderDiv!=undefined && options.loaderDiv!=null && (options.loaderDiv==true || options.loaderDiv=='true')){
    $('#div_carga').css('height','100%');
    $('#div_carga').show();
  } else{

  }
}).ajaxComplete(function(event, xhr, options) {
  $('#div_carga').hide();
});
  
var jsonConcat = function(objectA,objectB){
  for( var key in objectB){
    objectA[key] = objectB[key];
  }
  return objectA;
}


var bytesConversion= function(bytes){
  var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
  if (bytes == 0) {
    return '0 Byte';
  }
  var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
  return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}


function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

var isEmpty = function(theVar){
  if(theVar===null || theVar===undefined ){
    return true
  }
  if( (!isNumeric(theVar) && theVar ==='') || (isNumeric(theVar) && theVar===0) ){
    return true;
  }
  return false;
}