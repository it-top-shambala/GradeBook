#include "dbconfig.h"

QString DbConfig::provider() const
{
    return _provider;
}

QString DbConfig::hostName() const
{
    return _hostName;
}

QString DbConfig::dbName() const
{
    return _dbName;
}

QString DbConfig::userName() const
{
    return _userName;
}

QString DbConfig::password() const
{
    return _password;
}

DbConfig::DbConfig(QString path) {
    QFile file(path);

    if (!file.open(QFile::ReadOnly | QFile::Text)) throw QException();

    QTextStream fileStream(&file);
    auto data = fileStream.readAll();

    file.close();

    auto config = QJsonDocument::fromJson(data.toUtf8());
    _provider = config[PROVIDER].toString();
    _hostName = config[HOST_NAME].toString();
    _dbName = config[DB_NAME].toString();
    _userName = config[USER_NAME].toString();
    _password = config[PASSWORD].toString();
}
