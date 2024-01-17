import { User } from 'src/modules/user/entities/user.entity';
import {
  Column,
  Entity,
  JoinColumn,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class Contact {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  title: string;

  @Column()
  description: Text;

  @Column()
  location: string;

  @Column()
  locationUrl: string;

  @Column()
  phone: string;

  @Column()
  startWorking: string;

  @Column()
  endWorking: string;

  @Column()
  updatedAt: Date;

  @OneToOne(() => User)
  @JoinColumn()
  updatedBy: User;
}
