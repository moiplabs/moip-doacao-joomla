<?php 

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

echo "<div id=\"moip_logo\">";
if ($logo_on == 0) {
	echo "<img src=\"$logo\" alt=\"MoIP\" />";
}
elseif ($logo_on == 1) {
	echo $logo;
}
echo "</div>\n";

echo "<form name=\"f1\" action=\"https://www.moip.com.br/PagamentoMoIP.do\" onSubmit=\"converte()\" method=\"post\">";
echo "<center>";
echo "<p>Valor:&nbsp&nbsp<input type=\"text\" name=\"valor\" size=\"5\" class=\"inputbox\">";
echo "</p>";
echo "</center>";

echo "
<center>
<input type=\"hidden\" value=\"".$id_carteira."\" name=\"id_carteira\" />
<input type=\"hidden\" value=\"Doação\" name=\"nome\" />
<input type=\"image\"  name=\"moipsubmit\" src=\"https://www.moip.com.br/imgs/buttons/bt_doar_c03_e04.png\" />
</center>";

echo "</form>";

?>

<script>
function converte()
{
	var m_valor = document.f1.valor.value;
    var ivirgula = m_valor.indexOf(",");
    var iponto = m_valor.indexOf(".");
	if ( (ivirgula == -1) && (iponto == -1) ) 
	{
		m_valor = m_valor + "00"; //concatena dois zeros
		document.f1.valor.value = m_valor;
		return(true);
	}
	if ( ivirgula != -1 )
	{
		m_valor = m_valor.replace(".","");
		var casavir = m_valor.length - (ivirgula + 1);
		if (casavir == 0) //concatena um zero
		{
			m_valor = m_valor + "00";
			m_valor = m_valor.replace(",","");
			document.f1.valor.value = m_valor;
			return(true);
		}
		if (casavir == 1) //concatena um zero
		{
			m_valor = m_valor + "0";
			m_valor = m_valor.replace(",","");
			document.f1.valor.value = m_valor;
			return(true);
		}
		if (casavir == 2) //apenas remove a vírgula
		{
			m_valor = m_valor.replace(",","");
			document.f1.valor.value = m_valor;
			return(true);
		}
		m_valor = m_valor.substring(0,m_valor.length - casavir + 2); // remove casas desnecessárias
		m_valor = m_valor.replace(",","");
		document.f1.valor.value = m_valor;
		return(true);
	}
	if ( (ivirgula == -1) && (iponto != -1) )
	{
		m_valor = m_valor.replace(".","");
		m_valor = m_valor + "00"; //concatena dois zeros
		document.f1.valor.value = m_valor;
		return(true)
	}
	return(true);
}
</script>
