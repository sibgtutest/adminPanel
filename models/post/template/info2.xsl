

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

  <xsl:template match="info">
      <xsl:apply-templates/>
    <xsl:value-of select="well"/>
      <input type="text">
        <xsl:attribute name="id">
          <xsl:value-of select="@id"/>
        </xsl:attribute>
        <xsl:attribute name="name">
          <xsl:value-of select="@id"/>
        </xsl:attribute>
        <xsl:attribute name="value">
          <xsl:value-of select="well"/>
        </xsl:attribute>
      </input><br />

  </xsl:template>
</xsl:stylesheet>