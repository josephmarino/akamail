ALTER TABLE mailaccount ADD INDEX(id,mbox,host,login);
ALTER TABLE mailaccount ADD INDEX(mbox,nick);
ALTER TABLE mailaccount ADD INDEX(mbox,email);
ALTER TABLE mailaccount ADD INDEX(mbox,auto);
ALTER TABLE mailaccount ADD INDEX(mbox,folder);
ALTER TABLE mailaccount ADD INDEX(id,rdonly);

ALTER TABLE mailautorpd ADD INDEX(rdate,status);
ALTER TABLE mailautorpd ADD INDEX(sdate,status);

ALTER TABLE mailbook ADD INDEX(mbox,pemail);
ALTER TABLE mailbook ADD INDEX(mbox,bemail);
ALTER TABLE mailbook ADD INDEX(cid,mbox,mxprs);
ALTER TABLE mailbook ADD INDEX(mgroup);
ALTER TABLE mailbook ADD INDEX(pbdalert);  

ALTER TABLE mailbookgroup ADD INDEX(mgid,mbox,mrdonly);
ALTER TABLE mailbookgroup ADD INDEX(mbox,mgroup);
ALTER TABLE mailbookgroup ADD INDEX(mgid,mgroup);

ALTER TABLE mailbox ADD INDEX(mid,mbox);
ALTER TABLE mailbox ADD INDEX(mbox,mdelete);
ALTER TABLE mailbox ADD INDEX(mbox,mfolder,mdelete);
ALTER TABLE mailbox ADD INDEX(mbox,mhash,mdelete);

ALTER TABLE mailcontact ADD INDEX(mbox,maiden,bdate);

ALTER TABLE mailfilter ADD INDEX(id,mbox);
ALTER TABLE mailfilter ADD INDEX(mbox,mfrom);

ALTER TABLE mailfolder ADD INDEX(id,mbox);
ALTER TABLE mailfolder ADD INDEX(mbox,folder);

ALTER TABLE mailsignature ADD INDEX(mbox,name);
ALTER TABLE mailsignature ADD INDEX(id,mbox);
ALTER TABLE mailsignature ADD INDEX(mbox,dflt);
