#ifndef DBCONTEXT_H
#define DBCONTEXT_H

#include <QtSql>
#include <QList>

class DbContext
{
private:
    QSqlDatabase _db;

public:
    DbContext(const QString& server,
              const QString& databaseName,
              const QString& userName,
              const QString& password);
    ~DbContext();

    QList<QString> getAllGroups();
};

#endif // DBCONTEXT_H
