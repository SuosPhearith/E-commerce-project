import { User } from 'src/modules/user/entities/user.entity';
import {
  PrimaryGeneratedColumn,
  Column,
  OneToOne,
  JoinColumn,
  Entity,
} from 'typeorm';

@Entity()
export class ContactInfo {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  phone: string;

  @Column()
  country: string;

  @Column()
  zipCode: string;

  @OneToOne(() => User)
  @JoinColumn()
  userId: User;
}
