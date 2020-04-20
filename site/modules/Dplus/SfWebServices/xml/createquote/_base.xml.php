<DataSet xmlns="http://syacc.com:8080/sySFws/">
	<xs:schema id="NewDataSet" xmlns="" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:msdata="urn:schemas-microsoft-com:xml-msdata">
		<xs:element name="NewDataSet" msdata:IsDataSet="true" msdata:UseCurrentLocale="true">
			<xs:complexType>
			<xs:choice minOccurs="0" maxOccurs="unbounded">
				<xs:element name="Result">
					<xs:complexType>
						<xs:sequence>
							<xs:element name="QuoteID" type="xs:string" minOccurs="0"/>
							<xs:element name="DivisionID" type="xs:string" minOccurs="0"/>
							<xs:element name="QuoteExpirationDate" type="xs:string" minOccurs="0"/>
							<xs:element name="ShipFromLocation" type="xs:string" minOccurs="0"/>
							<xs:element name="ProductDescription" type="xs:string" minOccurs="0"/>
							<xs:element name="ProductNumber" type="xs:string" minOccurs="0"/>
							<xs:element name="RequestQuantity" type="xs:string" minOccurs="0"/>
							<xs:element name="UnitPrice" type="xs:string" minOccurs="0"/>
							<xs:element name="ExtPrice" type="xs:string" minOccurs="0"/>
							<xs:element name="PriceUOM" type="xs:string" minOccurs="0"/>
							<xs:element name="UnitWeight" type="xs:string" minOccurs="0"/>
							<xs:element name="ExtendedWeight" type="xs:string" minOccurs="0"/>
							<xs:element name="BaseQtyUOM" type="xs:string" minOccurs="0"/>
							<xs:element name="NextPODate" type="xs:string" minOccurs="0"/>
							<xs:element name="Discontinued" type="xs:string" minOccurs="0"/>
							<xs:element name="PackQTY" type="xs:string" minOccurs="0"/>
							<xs:element name="PiecesPerLB" type="xs:string" minOccurs="0"/>
							<xs:element name="ErrorMessage" type="xs:string" minOccurs="0"/>
						</xs:sequence>
					</xs:complexType>
				</xs:element>
				<?php if (!$error) : ?>
					<xs:element name="AvailQTY">
						<xs:complexType>
							<xs:sequence>
							<xs:element name="WHID" type="xs:string" minOccurs="0"/>
							<xs:element name="QTY" type="xs:string" minOccurs="0"/>
							<xs:element name="QTY_PACKAGE_MAX" type="xs:string" minOccurs="0"/>
							</xs:sequence>
						</xs:complexType>
					</xs:element>
				<?php endif; ?>
			</xs:choice>
			</xs:complexType>
		</xs:element>
	</xs:schema>
	<diffgr:diffgram xmlns:msdata="urn:schemas-microsoft-com:xml-msdata" xmlns:diffgr="urn:schemas-microsoft-com:xml-diffgram-v1">
		<NewDataSet>
			<?= $xml_header; ?>

			<?php if (!$error) : ?>
				<?= $xml_availability; ?>
			<?php endif ; ?>
		</NewDataSet>
	</diffgr:diffgram>
</DataSet>
