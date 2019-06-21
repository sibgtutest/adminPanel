<?xml version="1.0" encoding="WINDOWS-1251" ?>
<xsl:stylesheet version = "1.0" 
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>My CD Collection</h2>  
  <xsl:apply-templates/>  
  </body>
  </html>
</xsl:template>

<xsl:template match="caption">
  <h1 align="center">
    <xsl:value-of select="//caption"/>
  </h1> 
</xsl:template>

<xsl:template match="author">
  <h1 align="right">
    <xsl:value-of select="//author"/>
  </h1> 
</xsl:template>

</xsl:stylesheet>