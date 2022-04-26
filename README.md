Это мой мини проект, через данное приложение можно управлять БД моей курсовой работы

БД:
CREATE DATABASE Billing_system;
GO
Use Billing_system;
GO

CREATE TABLE Clients (
	client_name nvarchar(150) NOT NULL,
	iin bigint NOT NULL,
	zip_address nvarchar(50) NOT NULL,
	bank_code nvarchar(15) NOT NULL,
	bank_account nvarchar(25) NOT NULL,
	client_type tinyint NOT NULL DEFAULT '0', /* 0 - юр лицо, 1 - физ лицо */
	CONSTRAINT PK_Clients PRIMARY KEY CLUSTERED (iin)
)
GO

CREATE TABLE Contracts (
	iin bigint NOT NULL,
	contract_num int NOT NULL,
	date_of_conclusion date NOT NULL,
	period_of_contract nvarchar(20) NOT NULL
)
GO

CREATE TABLE ServiceContract (
	contract_num int NOT NULL,
	service_code int NOT NULL,
	tariff_plan_code int NOT NULL,
	CONSTRAINT PK_Service_Comtract PRIMARY KEY CLUSTERED (contract_num)
)
GO

CREATE TABLE ServiceCategories (
	service_category_code int NOT NULL,
	name_of_service_category nvarchar(50) NOT NULL,
	remark nvarchar(500),
	CONSTRAINT PK_Service_Categories PRIMARY KEY CLUSTERED (service_category_code)
)
GO

CREATE TABLE [Services] (
	service_code int NOT NULL,
	name_of_service nvarchar(100) NOT NULL,
	service_category_code int NOT NULL,
	CONSTRAINT PK_Services PRIMARY KEY CLUSTERED (service_code)
)
GO

CREATE TABLE Bank (
	bank_code nvarchar(15) NOT NULL,
	bank_name nvarchar(100) NOT NULL,
	bank_address nvarchar(150) NOT NULL
	CONSTRAINT PK_Bank PRIMARY KEY CLUSTERED (bank_code)
)
GO

CREATE TABLE Traffic (
	[date] date NOT NULL,
	session_start_time time NOT NULL,
	break_time time NOT NULL,
	iin bigint NOT NULL,
	numb_of_transferred_bytes bigint NOT NULL,
	numb_of_received_bytes bigint NOT NULL,
	service_code int NOT NULL
)
GO

CREATE TABLE TariffPlan (
	tariff_plan_code int NOT NULL,
	price money NOT NULL,
	tariff_validity_period nvarchar(20) NOT NULL,
	CONSTRAINT PK_Tariff_Plan PRIMARY KEY CLUSTERED (tariff_plan_code)
)
GO

CREATE TABLE Payment (
	iin bigint NOT NULL,
	contract_num int NOT NULL,
	payment_date datetime NOT NULL,
	total money NOT NULL
)
GO

CREATE TABLE PersonalAccount (
	iin bigint NOT NULL,
	balance_at_the_beginning_of_month money NOT NULL,
	income_sum money NOT NULL,
	cost_of_rendered_services money NOT NULL,
	[month] tinyint NOT NULL,
	[year] int NOT NULL
)
GO

ALTER TABLE [Contracts] WITH CHECK
	ADD CONSTRAINT [Contracts_fk0]
		FOREIGN KEY (iin) REFERENCES [Clients](iin)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [Contracts] CHECK CONSTRAINT [Contracts_fk0]
GO

ALTER TABLE [Contracts] WITH CHECK
	ADD CONSTRAINT [Contracts_fk1]
		FOREIGN KEY ([contract_num]) REFERENCES [ServiceContract]([contract_num])
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [Contracts] CHECK CONSTRAINT [Contracts_fk1]
GO

ALTER TABLE [ServiceContract] WITH CHECK
	ADD CONSTRAINT [Service_Contract_fk0]
		FOREIGN KEY (service_code) REFERENCES [Services](service_code)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [ServiceContract] CHECK CONSTRAINT [Service_Contract_fk0]
GO

ALTER TABLE [ServiceContract] WITH CHECK
	ADD CONSTRAINT [Service_Contract_fk1]
		FOREIGN KEY (tariff_plan_code) REFERENCES TariffPlan(tariff_plan_code)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [ServiceContract] CHECK CONSTRAINT [Service_Contract_fk1]
GO

ALTER TABLE [Services] WITH CHECK
	ADD CONSTRAINT [Services_fk0]
		FOREIGN KEY (service_category_code) REFERENCES ServiceCategories(service_category_code)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [Services] CHECK CONSTRAINT [Services_fk0]
GO

ALTER TABLE [Clients] WITH CHECK
	ADD CONSTRAINT [Clients_fk0]
		FOREIGN KEY (bank_code) REFERENCES [Bank](bank_code)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [Bank] CHECK CONSTRAINT [Clients_fk0]
GO

ALTER TABLE [Traffic] WITH CHECK
	ADD CONSTRAINT [Traffic_fk0]
		FOREIGN KEY (service_code) REFERENCES [Services](service_code)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [Traffic] CHECK CONSTRAINT [Traffic_fk0]
GO

ALTER TABLE [Payment] WITH CHECK
	ADD CONSTRAINT [Payment_fk0]
		FOREIGN KEY (iin) REFERENCES [Clients](iin)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE [Payment] CHECK CONSTRAINT [Payment_fk0]
GO

ALTER TABLE PersonalAccount WITH CHECK
	ADD CONSTRAINT [Personal_Account_fk0]
		FOREIGN KEY (iin) REFERENCES [Clients](iin)
			ON UPDATE CASCADE
			ON DELETE CASCADE
GO
ALTER TABLE PersonalAccount CHECK CONSTRAINT [Personal_Account_fk0]
GO

login page = http://localhost/db_manager/authorization.php