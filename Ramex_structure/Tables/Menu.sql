USE [RAMEX]
GO

/****** Object:  Table [dbo].[Menu]    Script Date: 28/12/2020 09:35:25 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Menu](
	[id_menu] [int] NOT NULL,
	[intitule_menu] [char](50) NULL,
 CONSTRAINT [PK_Menu] PRIMARY KEY CLUSTERED
(
	[id_menu] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO