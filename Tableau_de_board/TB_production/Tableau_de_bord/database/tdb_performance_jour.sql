ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tdb_performance_jour` AS
select count(`cl`.`numerocl`) AS `nbval`,
`utilisateurs`.`agence` AS `agence`,
`ville`.`lib_ville` AS `lib_ville`,
`cl`.`dateedition` AS `dateedition`,
year(`cl`.`dateedition`) AS `aaaa`,
month(`cl`.`dateedition`) AS `mm`,
dayofmonth(`cl`.`dateedition`) AS `jj`,
sum(`expedition`.`colis`) AS `nbrcolis`,
count(distinct `expedition`.`destinataire`) AS `nbrpos`,
count(`expedition`.`id`) AS `total`,
sum((case when (`expedition`.`livraisoncode` <> 1) then 1 else 0 end)) AS `nonlivre`,
sum((case when ((`expedition`.`motif` = 58) and (`expedition`.`livraisoncode` <> 1)) then 1 when (`expedition`.`livraisoncode` in (3,0)) then 1 else 0 end)) AS `nonlivrelivreur`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS10`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS12`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1400) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS14`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1600) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS16`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1800) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS18`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS20`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS22`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') <= 2359) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS23`
from (((`expedition` join `cl` on((`cl`.`numerocl` = `expedition`.`numerocl`))) join `utilisateurs` on((`cl`.`matricule` = `utilisateurs`.`matricule`))) join `ville` on((`utilisateurs`.`agence` = `ville`.`code_ville`))) group by `utilisateurs`.`agence`,`ville`.`lib_ville`,`cl`.`dateedition`,year(`cl`.`dateedition`),month(`cl`.`dateedition`),dayofmonth(`cl`.`dateedition`)
