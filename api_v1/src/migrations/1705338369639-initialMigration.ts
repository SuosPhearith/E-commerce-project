import { MigrationInterface, QueryRunner } from "typeorm";

export class InitialMigration1705338369639 implements MigrationInterface {
    name = 'InitialMigration1705338369639'

    public async up(queryRunner: QueryRunner): Promise<void> {
        await queryRunner.query(`CREATE TABLE "user" ("id" SERIAL NOT NULL, "fullname" character varying NOT NULL, "email" character varying NOT NULL, "password" character varying NOT NULL, "image" character varying NOT NULL, "role" integer NOT NULL, "status" boolean NOT NULL DEFAULT false, "createdAt" TIMESTAMP NOT NULL, "updatedAt" TIMESTAMP NOT NULL, CONSTRAINT "PK_cace4a159ff9f2512dd42373760" PRIMARY KEY ("id"))`);
    }

    public async down(queryRunner: QueryRunner): Promise<void> {
        await queryRunner.query(`DROP TABLE "user"`);
    }

}
