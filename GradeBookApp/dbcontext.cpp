#include "dbcontext.h"

DbContext::DbContext(const QString& provider,
                     const QString& server,
                     const QString& databaseName,
                     const QString& userName,
                     const QString& password) {
    _db = QSqlDatabase::addDatabase(provider);
    _db.setConnectOptions();
    _db.setHostName(server);
    _db.setDatabaseName(databaseName);
    _db.setUserName(userName);
    _db.setPassword(password);
}

QList<QString> DbContext::getAllGroups() {
    auto groups = new QList<QString>();

    _db.open();
    auto query = new QSqlQuery();
    auto sql = "SELECT id, name FROM table_groups;";
    query->exec(sql);
    while (query->next()) {
        //auto id = query->value(0).toInt();
        auto name = query->value(1).toString();
        groups->append(name);
    }
    _db.close();

    return *groups;
}
