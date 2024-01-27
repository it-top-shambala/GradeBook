#ifndef DBCONFIG_H
#define DBCONFIG_H

#include <QString>
#include <QJsonDocument>
#include <QFile>
#include <QException>
#include <QTextStream>

class DbConfig
{
private:
    const QString PROVIDER = "provider";
    const QString HOST_NAME = "host";
    const QString DB_NAME = "db";
    const QString USER_NAME = "user";
    const QString PASSWORD = "password";

    QString _provider;
    QString _hostName;
    QString _dbName;
    QString _userName;
    QString _password;

public:
    DbConfig(QString path);
    ~DbConfig();


    QString provider() const;
    QString hostName() const;
    QString dbName() const;
    QString userName() const;
    QString password() const;
};

#endif // DBCONFIG_H
