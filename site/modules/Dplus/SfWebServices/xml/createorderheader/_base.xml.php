<DataSet xmlns="http://syacc.com:8080/sySFws/">
	<xs:schema id="NewDataSet" xmlns="" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:msdata="urn:schemas-microsoft-com:xml-msdata">
		<xs:element name="NewDataSet" msdata:IsDataSet="true" msdata:UseCurrentLocale="true">
			<xs:complexType>
			<xs:choice minOccurs="0" maxOccurs="unbounded">
				<xs:element name="Result">
					<xs:complexType>
						<xs:sequence>
							<xs:element name="ErrorMessage" type="xs:string" minOccurs="0"/>
							<xs:element name="CreateOrderHeader" type="xs:string" minOccurs="0"/>
						</xs:sequence>
					</xs:complexType>
				</xs:element>
			</xs:choice>
			</xs:complexType>
		</xs:element>
	</xs:schema>
	<diffgr:diffgram xmlns:msdata="urn:schemas-microsoft-com:xml-msdata" xmlns:diffgr="urn:schemas-microsoft-com:xml-diffgram-v1">
		<NewDataSet xmlns="">
			<Result diffgr:id="Result1" msdata:rowOrder="0" diffgr:hasChanges="inserted">
				<?php if ($error) : ?>
					<ErrorMessage><?= $message; ?></ErrorMessage>
				<?php else : ?>
					<CreateOrderHeader><?= $OrderNumber; ?></CreateOrderHeader>
				<?php endif; ?>
			</Result>
		</NewDataSet>
	</diffgr:diffgram>
</DataSet>
